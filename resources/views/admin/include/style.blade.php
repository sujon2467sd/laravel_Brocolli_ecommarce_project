<link rel="stylesheet"
href="admin/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- toastr start for 4 link need ...its usable for botstrap 4 --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    $(document).ready(function() {
        @if(session('delete_success'))
            toastr.error('{{ session('delete_success') }}');
        @endif
    });
</script>

<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>

{{-- toastr end-}}




 {{-- font awesome  link --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- font awesome  link  end--}}

{{-- summer note css start--}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
{{-- summer note css end--}}


<!-- include libraries(jQuery, bootstrap) -->



{{-- bootstrap plaging  --}}
<link rel="stylesheet"  href="{{ asset('/')}}admin/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet"  href="{{ asset('/')}}admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"  href="{{ asset('/')}}admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet"  href="{{ asset('/')}}admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
{{-- bootstrap plaging end --}}




{{-- sub-category-dynamic start--}}

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

{{-- sub-category-dynamic end--}}



<link rel="stylesheet"  href="{{ asset('/')}}admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet"  href="{{ asset('/')}}admin/dist/css/adminlte.min2167.css?v=3.2.0">
<script nonce="ec4a9934-b40f-47f9-9d5f-a98c6d4e9325">
try {
   (function (w, d) {
       ! function (j, k, l, m) {
           j[l] = j[l] || {};
           j[l].executed = [];
           j.zaraz = {
               deferred: [],
               listeners: []
           };
           j.zaraz._v = "5592";
           j.zaraz.q = [];
           j.zaraz._f = function (n) {
               return async function () {
                   var o = Array.prototype.slice.call(arguments);
                   j.zaraz.q.push({
                       m: n,
                       a: o
                   })
               }
           };
           for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
           j.zaraz.init = () => {
               var q = k.getElementsByTagName(m)[0],
                   r = k.createElement(m),
                   s = k.getElementsByTagName("title")[0];
               s && (j[l].t = k.getElementsByTagName("title")[0].text);
               j[l].x = Math.random();
               j[l].w = j.screen.width;
               j[l].h = j.screen.height;
               j[l].j = j.innerHeight;
               j[l].e = j.innerWidth;
               j[l].l = j.location.href;
               j[l].r = k.referrer;
               j[l].k = j.screen.colorDepth;
               j[l].n = k.characterSet;
               j[l].o = (new Date).getTimezoneOffset();
               if (j.dataLayer)
                   for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                           ...x[1],
                           ...y[1]
                       })), {}))) zaraz.set(w[0], w[1], {
                       scope: "page"
                   });
               j[l].q = [];
               for (; j.zaraz.q.length;) {
                   const z = j.zaraz.q.shift();
                   j[l].q.push(z)
               }
               r.defer = !0;
               for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                   .startsWith("_zaraz_"))).forEach((B => {
                   try {
                       j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                   } catch {
                       j[l]["z_" + B.slice(7)] = A.getItem(B)
                   }
               }));
               r.referrerPolicy = "origin";
               r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[
                   l])));
               q.parentNode.insertBefore(r, q)
           };
           ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
               "DOMContentLoaded", zaraz.init)
       }(w, d, "zarazData", "script");
   })(window, document)
} catch (e) {
   throw fetch("/cdn-cgi/zaraz/t"), e;
};

</script>
