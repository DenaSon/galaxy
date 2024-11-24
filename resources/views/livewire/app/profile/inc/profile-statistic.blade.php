


<x-stat
    title="آماده سازی"
    color="text-yellow-500" class=""
    value="{{ $user->orders->where('status','preparing')->count() }}"
    icon="o-arrow-path" tooltip=""  />

<x-stat
    title="ارسال شده"
    color="text-orange-500" class=""
    value="{{ $user->orders->where('status','sended')->count() }}"
    icon="o-arrow-up-tray" tooltip=""  />



<x-stat
    title="تحویل شده"
    color="text-green-500" class=""
    value="{{ $user->orders->where('status','delivered')->count() }}"
    icon="o-hand-thumb-up" tooltip=""  />

<x-stat
    title="لغو شده"
    color="text-red-500" class=""
    value="{{ $user->orders->where('status','cancelled')->count() }}"
    icon="o-archive-box-x-mark" tooltip=""  />
