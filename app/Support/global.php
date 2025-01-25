<?php

use App\Models\Address;
use App\Models\Log;
use App\Models\Product;
use App\Models\Setting;
use Cryptommer\Smsir\Objects\Parameters;
use Cryptommer\Smsir\Smsir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use Morilog\Jalali\Jalalian;


/*
|--------------------------------------------------------------------------
| Global Functions
|--------------------------------------------------------------------------
|| Here is for common website functions as helper . These
| functions are loaded by the laravel in everywhere  and all of them will
| be assigned to the "Setting" model .
|*/


/**
 * Random Code Generator based on Date and 3 random numbers.
 *
 * @param int $end
 * @return String
 *
 * @throws Exception
 */
function SkuMaker(int $end = 9999): string
{

    try {
        $currentDate = date('ymNi');
        $random_int = random_int(1000, $end);
        $additionalRandom = rand(1, 9); // Additional random number

        return $currentDate . $random_int . $additionalRandom;
    } catch (Exception $e) {

        setLog('Make-Sku', $e->getMessage(), 'danger');

        return 'Error';
    }

}


/**
 * Send SMS API
 *
 * @param string $value
 * @param string $phoneNumber
 * @param int $templateID
 * @param string $parameterName
 * @return mixed
 */


function sendSms(array $params, string $phoneNumber, int $templateID)
{
    try {
        $send = Smsir::send();
        $parameters = array_map(function ($key, $value) {
            return new Parameters($key, $value);
        }, array_keys($params), $params);

        $response = $send->Verify($phoneNumber, $templateID, $parameters);
    } catch (Throwable $e) {
        $errorMessage = $e->getMessage();
        \Illuminate\Support\Facades\Log::error($errorMessage);
    }
}


/**
 * Send SMS API
 *
 * @param string $phoneNumber
 * @param int $templateID
 * @param array|string $parameterName
 * @return mixed
 */

function sendVerifySms(string $phoneNumber, int $templateID, array $parameters): bool
{
    try {
        $send = Smsir::send();
        $response = $send->Verify($phoneNumber, $templateID, $parameters);

        if ($response->Status == 1) {
            return true;
        } else {
            \Illuminate\Support\Facades\Log::error('SMS sending failed: ' . $response->message);
            return false;
        }
    } catch (Throwable $e) {
        \Illuminate\Support\Facades\Log::error('Error sending SMS: ' . $e->getMessage());


        return false;
    }


}

/**
 * Zarinpal Payment
 *
 * @param int $amount
 * @param string $description
 * @param string $callbackUrl
 * @param string $mobile
 * @param string $email
 * @return mixed
 */
function sendPayment(int $amount, string $description, string $callbackUrl, string $mobile = '', string $email = ''): mixed
{
    try {
        $response = zarinpal()
            ->amount($amount)
            ->request()
            ->description($description)
            ->callbackUrl($callbackUrl)
            ->mobile($mobile)
            ->email($email)
            ->send();

        if (!$response->success()) {
            $message = $response->error()->message();
            setLog('Send-Payment', $message, 'warning');
            return redirect()->back();
        }

        return $response->redirect();


    } catch (Throwable $e) {
        setLog('Send-Payment', $e->getMessage() . ' | Source : ' . $e->getFile() . ' | Line : ' . $e->getLine(), 'danger');
        return false;
    }


}

/**
 * Filter Product Based on Properties and Properties Values
 *
 * @param string $attributeName
 * @param string $attributeValue
 * @param string $field
 * @param int $limit
 * @param string $orderField
 * @param string $order
 * @return mixed
 */
function filterProduct(string $attributeName, string $attributeValue, string $field = '', int $limit = 100, string $orderField = 'created_at', string $order = 'DESC'): mixed
{
    // Prepare the query with parameter binding
    $query = Product::query()
        ->join('property_propertyvalue_product', 'products.id', '=', 'property_propertyvalue_product.product_id')
        ->join('propertyvalues', 'property_propertyvalue_product.propertyvalue_id', '=', 'propertyvalues.id')
        ->join('properties', 'propertyvalues.property_id', '=', 'properties.id')
        ->where('properties.name', '=', $attributeName)
        ->where('propertyvalues.value', '=', $attributeValue);

    if (!empty($field)) {
        $query->select('products.' . $field);
    }

    $query->limit($limit);

    if (!empty($orderField) && in_array($orderField, ['created_at', 'updated_at', 'id'])) {
        $query->orderBy('products.' . $orderField, $order);
    }

    if ($limit === 1) {
        return $query->first();
    }

    return $query->paginate($limit);
}


/**
 * Get Setting Value Based On Setting Key
 *
 * @param string|null $key
 * @return mixed
 */
$settingsCache = null;

function getSettings(): array
{
    global $settingsCache;

    if ($settingsCache === null) {
        $settingsCache = cache()->remember('site_settings', now()->addDays(7), function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    return $settingsCache;
}

function getSetting(string $key): mixed
{
    $settings = getSettings();
    return $settings[$key] ?? null;
}

/**
 * Set Log and report to programmer
 *
 */
function setLog($action = null, $description = null, $severity = null)
{

    try {

        $logOnOff = getSetting('log_on_off');
        if ($logOnOff == 'on') {
            $log = new Log();
            $user_id = Auth::check() ? Auth::id() : null;
            $request = request();
            $log->user_id = $user_id;
            $log->action = $action;
            $log->description = $description;
            $log->ip_address = $request->ip();
            $log->request_payload = json_encode($request->all()); // Convert request data to JSON

            $log->user_agent = $request->userAgent();
            $log->severity = $severity;
            $log->save();

        }

    } catch (Throwable $e) {

        Log::error('Failed to save log entry: ' . $e->getMessage());

    }

}

/**
 * @param $datetime
 * @return string
 */
function toSystemDate($datetime)
{
    $jalaliDate = Jalalian::fromFormat('Y-m-d H:i', $datetime);
    $gregorianDate = $jalaliDate->toCarbon();
    return $gregorianDate->format('Y-m-d H:i:s');
}

/**
 * @param $date
 * @return string
 */
function toSystemDateOnly($date)
{
    $jalaliDate = Jalalian::fromFormat('Y-m-d', $date);
    $gregorianDate = $jalaliDate->toCarbon();
    return $gregorianDate->format('Y-m-d');
}


function slugMaker($string)
{
    // Convert string to lowercase
    $slug = strtolower($string);

    // Replace special characters or spaces with a dash
    $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $slug);

    // Remove multiple dashes
    $slug = preg_replace('/-+/', '-', $slug);

    // Remove leading/trailing dashes
    $slug = trim($slug, '-');

    return $slug;
}


function getArticleReadTime($text = 'abc', $division = 100, $locale = 'fa')
{
    $str = Str::length($text);
    $length = round($str / $division, 0, PHP_ROUND_HALF_DOWN) ?? 1;
    $result = Number::spell($length, $locale);

    return $result ?? 0;
}

function userAddressExist($authId): bool
{
    //get user address
    $addressExists = (bool)Address::whereUserId($authId)->whereIsDefault(1)->first();

    return $addressExists;
}


function imageOptimizer($directory, $imageName, $rectangleWidth, $rectangleHeight, $quality = 90)
{
    $new_directory = $directory . '/' . $imageName;
    $manager = new ImageManager(new Driver());
    $image = $manager->read($new_directory);
    $image->resize(width: $rectangleWidth, height: $rectangleHeight);

    $imageWidth = $image->width();
    $imageHeight = $image->height();

    $startX = max(0, ($imageWidth - $rectangleWidth) / 2);
    $startY = max(0, ($imageHeight - $rectangleHeight) / 2);
    $image->crop($rectangleWidth, $rectangleHeight, $startX, $startY);
    $image->save(null, $quality);
}


/**
 * @throws Exception
 */
function singleProductUrl($productId, $slug = 'slug')
{
    return route('home.product.singleProduct', ['product' => $productId, 'slug' => slugMaker($slug ?? 'product')]) ?? '';
}

function singleBlogUrl($blogId, $slug)
{
    return route('home.blog.singleBlog', ['blog' => $blogId, 'slug' => slugMaker($slug)]) ?? '';
}

function singleCategoryUrl($categoryId, $slug)
{
    return route('home.product.singleCategory', ['category' => $categoryId, 'slug' => slugMaker($slug)]) ?? '';
}

function homeUrl()
{
    return route('home.index-home');
}

function formatPhoneNumber($phoneNumber)
{
    if (strlen($phoneNumber) === 11) {

        return substr($phoneNumber, 0, 4) . '-' .
            substr($phoneNumber, 4, 3) . '-' .
            substr($phoneNumber, 7, 4);
    } else {
        return $phoneNumber;
    }
}


/**
 * Convert persian numbers to system(english) numbers
 *
 * @param int $value
 * @return numeric
 *
 * @throws Exception
 */
function convertPersianNumbers($string): float|int|string
{
    try {
        $persian_numbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persian_numbers, $english_numbers, $string);
    } catch (Throwable $e) {
        \Illuminate\Support\Facades\Log::error($e->getMessage());
    }
}

function getShippingAddress($address)
{
    if (!$address) {
        throw new \Exception('Address not found.');
    }

    $shippingAddress = sprintf(
        "%s, %s, %s, %s",
        $address->province->name ?? 'N/A',
        $address->city->name ?? 'N/A',
        $address->address_line,

        ' کد پستی :  ' .
        $address->postal_code ?? 'N/A'
    );

    return $shippingAddress;
}

function noPictureUrl()
{
    return asset('static/denapax-image/nopicuser.png') ?? '';
}


function getWikipediaInfo($title=''): string
{

    try
    {
        $response = Http::get('https://fa.wikipedia.org/w/api.php', [
            'action' => 'query',
            'format' => 'json',
            'titles' => $title,
            'prop' => 'extracts',
            'exintro' => true,
        ]);


        if ($response->successful()) {

            $data = $response->json();

            $page = current($data['query']['pages']);

            if (isset($page['extract'])) {

                $description = $page['extract'];


                $cleanDescription = strip_tags($description);


                return $cleanDescription;

            }
            else
            {
                return 'توضیحات موجود نیست';
            }
        }


        return 'خطا در دریافت اطلاعات';

    }
    catch (THrowable $e)
    {
        \Illuminate\Log\log($e->getMessage());
        return 'توضیحات موجود نیست';
    }

}
