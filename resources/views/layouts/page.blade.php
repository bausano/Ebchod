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
                <div id="search">
                    <form>
                        <input class="toggle-autocomplete" placeholder="Filtr" type="text" />
                        {!! csrf_field() !!}
                        <button class="toggle-filter"><i class="fa fa-gear"></i></button>
                        <button class="orange"><i class="fa fa-search"></i></button>
                    </form>

                    <ul class="autocomplete">   
                    </ul>
                        
                    @include('partials.filter')

                    <p class="small italic dark-grey-text">Oblíbené: Kočárky</p>
                </div>
            </div>
        </div>
        
        @yield('main')

        @include('partials.footer')

    </body>
</html>
