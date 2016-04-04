<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="master">
        <div class="row header">

            <!--
            <div class="img-header" data-image="/img/banner.png" data-width="1300" data-height="865"></div>
            <div class="img-header" data-image="/img/banner2.png" data-width="1697" data-height="1131"></div>
            <div class="img-header" data-image="/img/banner.jpg" data-width="2000" data-height="1000"></div>
            <div class="img-header" data-image="/img/banner2.jpg" data-width="2000" data-height="1000"></div>
            -->
            <div class="img-header" data-image="/img/banner3.jpg" data-width="3500" data-height="1555"></div>
            <div class="col-12">
                <nav>
                    <a class="logo" href="/"><img src="/img/logo-60.png" alt="Logo"></a>
                    <a href="">Spolupráce</a>
                    <a href="">Články</a>
                    <a href="">Kategorie</a>
                    <a href="">Nejnovější zboží</a>
                </nav>
                <div class="motto">
                    <h1 class="center light dark-grey-text">Nejširší škála zboží na jednom místě</h1>
                </div>

                @include('partials.filter')
                
            </div>
        </div>
        
        @yield('main')
        
        @include('partials.footer')

        <img src="" width="0" />
    </body>
</html>
