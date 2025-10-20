@extends('layouts.navigation')

@section('title', 'pagina_pirncipal')

@section('body')  
    <header>
        <a href="#" class="logo">air<span>bee</span></a>
        
        <div class="city-indicator">
            <span>📍</span>
            <span>Tatui, São Paulo</span>
        </div>
        
        <div class="search-bar">
            <div>Qualquer data</div>
            <div>Qualquer bairro</div>
            <div>Hóspedes</div>
            <div>🔍</div>
        </div>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route("profile.edit" ) }}">Perfil</a></li>
            <form method="POST" action="{{ route('logout') }}">
                 @csrf
            <li><a class="dropdown-item" href="{{ route("logout") }}">Logout</a></li>
            </form>
          </ul>
        </li>
    </header>
    
   
    <section class="hero">
        <h1>Descubra em Tatuí</h1>
        <p>Encontre acomodações únicas e experiências autênticas na Cidade Maravilhosa</p>
        
        <div class="search-container">
            <div class="search-large">
                <input type="text" placeholder="Pesquisar bairros, restaurantes, pontos turísticos...">
                <button>🔍 Pesquisar</button>
            </div>
        </div>
    </section>
    
   
    <section class="city-highlights">
        <h2>A Cidade Maravilhosa</h2>
        <p class="city-description">Conhecida como a Capital da Música, Tatuí é uma cidade do interior paulista marcada pela tradição cultural, com destaque para o renomado Conservatório de Música, além de oferecer qualidade de vida, história e hospitalidade</p>
        
        <div class="highlights-grid">
            <div class="highlight-card">
                <img src="museuu.jpg">
                <div class="highlight-info">
                    <h3>Praça do Museu</h3>
                    <p>A Praça do Museu, em Tatuí, é um espaço acolhedor de convivência, rodeado de verde, bancos e um ambiente tranquilo, ideal para passeios e momentos de descanso ao ar livre.</p>
                </div>
            </div>
            
            <div class="highlight-card">
                <img src="ceu.jpg">
                <div class="highlight-info">
                    <h3>Céu das Artes</h3>
                    <p>O CEU das Artes, em Tatuí, é um centro cultural e esportivo que oferece atividades artísticas, oficinas e lazer para toda a comunidade.</p>
                </div>
            </div>
            
            <div class="highlight-card">
                <img src="concervatorio.jpg">
                <div class="highlight-info">
                    <h3>Conservatório</h3>
                    <p>O Conservatório Dramático e Musical de Tatuí é um dos maiores e mais respeitados centros de ensino de música da América Latina, referência cultural e artística.</p>
                </div>
            </div>
        </div>
    </section>
    
  
    <section class="neighborhoods">
        <h2>Explore os Bairros de Tatuí</h2>
        
        <div class="neighborhood-list">
            <div class="neighborhood-item">
                <img src="https://images.unsplash.com/photo-1551376347-2dce3cd2bc8a?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="" class="neighborhood-image">
                <div class="neighborhood-info">
                    <div class="neighborhood-name">Europark</div>
                    <div class="neighborhood-distance">Bairro residencial planejado, com ruas tranquilas e boa infraestrutura, ideal para quem busca qualidade de vida.</div>
                </div>
            </div>
            
            <div class="neighborhood-item">
                <img src="https://images.unsplash.com/photo-1598900864375-2d78dd6c7c77?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="" class="neighborhood-image">
                <div class="neighborhood-info">
                    <div class="neighborhood-name">Jardim Gonzaga</div>
                    <div class="neighborhood-distance">Região tradicional de Tatuí, com comércio local e fácil acesso a diferentes pontos da cidade.</div>
                </div>
            </div>
            
            <div class="neighborhood-item">
                <img src="https://images.unsplash.com/photo-1597733336794-12d05021aad5?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="" class="neighborhood-image">
                <div class="neighborhood-info">
                    <div class="neighborhood-name">Bairro Junqueira</div>
                    <div class="neighborhood-distance">Área conhecida pela tranquilidade e pelo perfil familiar, com forte identidade comunitária.</div>
                </div>
            </div>
            
            <div class="neighborhood-item">
                <img src="https://images.unsplash.com/photo-1621451537084-482c73073a0f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="" class="neighborhood-image">
                <div class="neighborhood-info">
                    <div class="neighborhood-name">Bela Vista</div>
                    <div class="neighborhood-distance">Bairro em constante crescimento, que une residências e comércio, oferecendo praticidade no dia a dia.</div>
                </div>
            </div>
            
            <div class="neighborhood-item">
                <img src="https://images.unsplash.com/photo-1621878782327-9ec5f311a1a9?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="" class="neighborhood-image">
                <div class="neighborhood-info">
                    <div class="neighborhood-name">Chácara Junqueira</div>
                    <div class="neighborhood-distance">Espaço com características mais rurais e amplas áreas verdes, marcado pela atmosfera de sossego.</div>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="listings">
        <div class="listings-header">
            <h2>Acomodações em Destaque em Tatuí</h2>
            <div class="show-all">Ver todas as opções</div>
        </div>
        
        <div class="listing-grid">
           
            <div class="listing-card">
                 <img src="chacarra.avif" alt="Casa com vista para o mar" class="listing-image">
                   <div class="listing-info">
                    <div class="listing-location">Casa · Bairro Junqueira</div>
                    <div class="listing-dates">15-20 de outubro</div>
                    <div class="listing-price">R$ 289 <span>noite</span></div>
                </div>
            </div>
            
           
            <div class="listing-card">
                <img src="apt 1.avif" alt="Casa com vista para o mar" class="listing-image">
                <div class="listing-info">
                    <div class="listing-location">Apartamento · Ipanema</div>
                    <div class="listing-dates">10-15 de novembro</div>
                    <div class="listing-price">R$ 450 <span>noite</span></div>
                </div>
            </div>
            
           
            <div class="listing-card">
                <img src="apt 2.avif" alt="Studio em Santa Teresa" class="listing-image">
                <div class="listing-info">
                    <div class="listing-location">Apartamento · Santa Teresa</div>
                    <div class="listing-dates">5-12 de dezembro</div>
                    <div class="listing-price">R$ 189 <span>noite</span></div>
                </div>
            </div>
            
           
            <div class="listing-card">
                <img src="casa 2.avif" alt="Loft no Leblon" class="listing-image">
                <div class="listing-info">
                    <div class="listing-location">Casa · Leblon</div>''''
                    <div class="listing-dates">20-25 de novembro</div>
                    <div class="listing-price">R$ 520 <span>noite</span></div>
                </div>
            </div>
        </div>
    </section>
    
   
    <section class="experiences">
        <h2>Experiências Únicas em Tatuí</h2>
        
        <div class="experiences-grid">
            <div class="experience-card">
                <img src="emilio.jpg" alt="Passeio de helicóptero" class="experience-image">
                <div class="experience-info">
                    <div class="experience-title">Emílio lounge bar</div>
                    <div class="experience-description">O Emílio Lounge Bar, em Tatuí, combina boa gastronomia, drinks variados e um ambiente moderno e descontraído para curtir entre amigos</div>
                    <div class="experience-price">A partir de R$ 150 por pessoa</div>
                </div>
            </div>
            
            <div class="experience-card">
                <img src="verana.jpg" alt="Aula de samba" class="experience-image">
                <div class="experience-info">
                    <div class="experience-title">Verana</div>
                    <div class="experience-description">O Verana, em Tatuí, oferece um ambiente sofisticado e acolhedor, com ótima gastronomia e drinks especiais para momentos únicos</div>
                    <div class="experience-price">A partir de R$ 120 por pessoa</div>
                </div>
            </div>
            
            <div class="experience-card">
                <img src="clube.jpg" alt="Trilha na Floresta da Tijuca" class="experience-image">
                <div class="experience-info">
                    <div class="experience-title">Clube de Campo</div>
                    <div class="experience-description">O Clube de Campo de Tatuí é um espaço tradicional de lazer e convivência, com áreas esportivas, piscinas e eventos para toda a família</div>
                    <div class="experience-price">A partir de R$ 230 por pessoa</div>
                </div>
            </div>
            
            <div class="experience-card">
                <img src="bodega.jpg" alt="Tour gastronômico" class="experience-image">
                <div class="experience-info">                                                                                   
                    <div class="experience-title">Bodega</div>
                    <div class="experience-description">O Bodega, em Tatuí, é um bar e restaurante descontraído, conhecido pelo clima animado, boa comida e música ao vivo</div>
                    <div class="experience-price">A partir de R$ 150 por pessoa</div>
                </div>
            </div>
        </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    </section>
    
@endsection
