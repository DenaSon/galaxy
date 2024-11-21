<x-stat
    title="سفارش جاری"

    value="{{ $user->orders->count() }}"
    icon="o-archive-box" class="" />


<x-stat
    title="آماده سازی"
    color="text-yellow-500" class=""
    value="{{ $user->orders->where('status','delivered')->count() }}"
    icon="o-inbox-stack" tooltip=""  />


<x-stat
    title="تحویل شده"
    color="text-green-500" class=""
    value="{{ $user->orders->where('status','delivered')->count() }}"
    icon="o-inbox-stack" tooltip=""  />

<x-stat
    title="لغو شده"
    color="text-red-500" class=""
    value="{{ $user->orders->where('status','delivered')->count() }}"
    icon="o-inbox-stack" tooltip=""  />
