<!DOCTYPE html>
<html>
    
    @include('partials.head')

    <body>
        <div class="row header">
            <div class="img-header" data-image="/img/banner.png" data-width="1300" data-height="865"></div>
            <div class="col-12">
                <nav>
                    <a class="logo" href="/"><img src="/img/logo-60.png" alt="Logo"></a>
                    <a href="">Spolupráce</a>
                    <a href="">Články</a>
                    <a href="">Kategorie</a>
                    <a href="">Nejnovější zboží</a>
                </nav>
                <div class="motto">
                    <h1 class="center light light-grey-text">Nejširší škála zboží na jednom místě</h1>
                </div>
                <div id="search">
                    <form>
                        <input class="toggle-autocomplete" placeholder="Vyhledávání" type="text" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="toggle-settings"><i class="fa fa-plus"></i></button>
                        <button class="orange"><i class="fa fa-search"></i></button>
                    </form>

                    <div class="settings">
                        <div class="area">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam necessitatibus culpa quidem expedita! Consequuntur accusantium fugiat iusto explicabo facilis, amet.</p>
                        </div>
                    </div>
                    <ul class="autocomplete">   
                    </ul>

                    <p class="small italic light-grey-text">Oblíbené: Kočárky</p>
                </div>
            </div>
        </div>
        
        @yield('main')
        
        @include('partials.footer')
    </body>
</html>
