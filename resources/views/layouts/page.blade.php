<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body id="page">
        <div class="row header">
            <div class="col-12">
                <nav>
                    <!-- <a class="logo" href="/"><img src="/img/logo-60.png" alt="Logo"></a>-->
                    <a href="">Spolupráce</a>
                    <a href="">Články</a>
                    <a href="">Kategorie</a>
                    <a href="">Nejnovější zboží</a>
                </nav>
                
                @include('partials.filter')

            </div>
        </div>
        
        @yield('main')

        @include('partials.footer')

    </body>
</html>
