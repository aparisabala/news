<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    @include('site.includes.header-resource', ['tabTitle' => $tabTitle ?? 'Site Title'])
</head>
<body>
    <div class="modal fade editmodal edimodalGlob" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-18 font-bold" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    @include('site.includes.header')
    @yield('breadCum')
        @yield('page')
    @include('site.includes.footer')
    @include('site.includes.footer-resource', ['react' => $react ?? []])
</body>
</html>

