<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body>
        <div class="row header grey-bg">
            <div class="col-12">
                <nav>
                    <a class="logo" href="/"><img src="/img/logo-60.png" alt="Logo"></a>
                    <a href="">Spolupráce</a>
                    <a href="">Články</a>
                    <a href="">Kategorie</a>
                    <a href="">Nejnovější zboží</a>
                </nav>
                <div id="search">
                    <input placeholder="Vyhledávání" type="text" />
                    <button><i class="fa fa-plus"></i></button>
                    <button class="orange"><i class="fa fa-search"></i></button>

                    <div class="settings"></div>
                    <div class="autocomplete"></div>

                    <p class="small italic light-grey-text">Oblíbené: Kočárky</p>
                </div>
            </div>
        </div>
        
        @yield('main')

        @include('partials.footer')

    </body>
</html>
