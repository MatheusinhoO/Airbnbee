
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbee Tatuí - Encontre lugares únicos em Tatuí</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Airbee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <style>
        * {
            
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            color: #222222;
            background-color: #ffffff;
        }


        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            border-bottom: 1px solid #ebebeb;
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 100;
        }

        .logo {
            height: 50px;
        }

        .logo span {
            color: #222222;
        }

        .city-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: #484848;
        }

        .search-bar {
            display: flex;
            border: 1px solid #ebebeb;
            border-radius: 40px;
            padding: 10px 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        .search-bar div {
            padding: 0 16px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
        }

        .search-bar div:not(:last-child) {
            border-right: 1px solid #ebebeb;
        }

        .search-bar div:last-child {
            display: flex;
            align-items: center;
            background-color: #ffd700;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            justify-content: center;
            margin-left: 8px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-menu a {
            text-decoration: none;
            color: #222222;
            font-weight: 500;
            font-size: 14px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 5px 5px 12px;
            border: 1px solid #ebebeb;
            border-radius: 21px;
            cursor: pointer;
        }

        .user-profile:hover {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        footer {
            background-color: #222222;
            color: white;
            padding: 60px 40px 40px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-column h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #ffd700;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 12px;
        }

        .footer-column a {
            color: #dddddd;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-column a:hover {
            color: #ffd700;
        }

        .footer-bottom {
            margin-top: 60px;
            padding-top: 24px;
            border-top: 1px solid #444444;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            font-size: 14px;
        }

        .copyright {
            color: #aaaaaa;
        }

        .social-links {
            display: flex;
            gap: 16px;
        }

        .social-links a {
            color: #dddddd;
            text-decoration: none;
        }


        @media (max-width: 1024px) {
            .highlights-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 16px 20px;
                flex-wrap: wrap;
            }

            .city-indicator {
                order: 2;
                width: 100%;
                justify-content: center;
                margin: 10px 0;
            }

            .search-bar {
                order: 3;
                width: 100%;
                margin-top: 16px;
                justify-content: space-between;
            }

            .hero {
                padding: 40px 20px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .city-highlights,
            .neighborhoods,
            .listings,
            .experiences {
                padding: 40px 20px;
            }

            .highlights-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
        }
    </style>
<body>

    <header>
            <div class="logo">
                    <a class="logo" href="{{ route('dashboard') }}">
                        <img src="logol.png" alt=""  width="70" height="70">
                    </a>
                </div>





        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>

            </ul>
        </li>
    </header>



    <div class="mt-4">
        @yield('body')
    </div>


    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>Airbee Tatuí</h3>
                <ul>
                    <li><a href="#">Sobre o Airbee Tatuí</a></li>
                    <li><a href="#">Carreiras</a></li>
                    <li><a href="#">Imprensa</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Comunidade</h3>
                <ul>
                    <li><a href="#">Diversidade e pertencimento</a></li>
                    <li><a href="#">Acessibilidade</a></li>
                    <li><a href="#">Airbee Associates</a></li>
                    <li><a href="#">Convidar amigos</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Anfitrião</h3>
                <ul>
                    <li><a href="#">Hospede em Tatuí</a></li>
                    <li><a href="#">Recursos para anfitriões</a></li>
                    <li><a href="#">Histórias de anfitriões</a></li>
                    <li><a href="#">Central da Comunidade</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Suporte</h3>
                <ul>
                    <li><a href="#">Central de Ajuda</a></li>
                    <li><a href="#">Informações sobre COVID-19</a></li>
                    <li><a href="#">Opções de cancelamento</a></li>
                    <li><a href="#">Apoio ao bairro</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="copyright">
                © 2023 Airbee Tatuí, Inc. · Privacidade · Termos · Mapa do site
            </div>
            <div class="social-links">
                <a href="#">🌐 Português (BR)</a>
                <a href="#">R$ BRL</a>
                <a href="">Torne-se um Anfitrião</a>
                <a href="#">🐦</a>
                <a href="#">📷</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const cards = document.querySelectorAll(
                '.listing-card, .neighborhood-item, .highlight-card, .experience-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.transition = 'transform 0.2s';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });


            const neighborhoodItems = document.querySelectorAll('.neighborhood-item');
            neighborhoodItems.forEach(item => {
                item.addEventListener('click', function() {
                    const neighborhoodName = this.querySelector('.neighborhood-name').textContent;
                    alert(
                        `Você selecionou o bairro: ${neighborhoodName}. Em uma implementação real, isso filtraria as acomodações por bairro.`
                        );
                });
            });


            const searchButton = document.querySelector('.search-large button');
            searchButton.addEventListener('click', function() {
                const searchInput = document.querySelector('.search-large input');
                if (searchInput.value.trim() !== '') {
                    alert(`Buscando por: "${searchInput.value}" no Rio de Janeiro`);
                } else {
                    alert('Digite algo para pesquisar');
                }
            });
        });
    </script>
</body>

</html>
