<?php use App\Helpers\Helper;?>
<nav class="navbar navbar-light">
    <style>
 
    #apperinnotify{display: none;}
   .hamid{display: none;position: fixed;z-index: 100;top: 0;right: 0;bottom: 0;left: 0;background-color: rgba(0,0,0,.8);}
   .login{
   /* display: none;*/
    width: 30vw;
    height: 240px;
    height: fit-content;
    background-color: white;
    margin-top: 50px;
    box-shadow: 1px 1px 5px 1px gray;
    z-index: 12;
    position: absolute;
    border: 1px solid gray;
    border-radius: 12px;
    text-transform: capitalize;    
    margin-left: 37vw;
    margin-right: 37vw;
    text-align: center;
     opacity: 1 import;
}
.login #x{
    margin-left: 27vw;
    cursor: pointer;
    font-size: 30px;
    margin-top: 10px;
    color: #23262a;
}
.login h2,.login h4,.login p{
    margin-bottom: 30px;
    margin-top: 30px;
    color: #23262a;
}
.login a{
    width: 90%;
    color: #23262a;
    fill: #e00000;
    background-color: #fff;
    height: 48px;
    border: 0.1rem solid #f08080;
    margin-bottom: 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 12px;
    cursor: pointer;
}

.login button i{
    margin-right: 10px;
    font-size: 23px;
}
#totakeclone{
    display: none;
}
@media(max-width:950px){
    .login{
    width: 60vw;
    margin-left: 18vw;
     margin-right: 18vw;
}
}

    </style>
       <div id="totakeclone">
                            <li id="opploi" class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                <div class="nav-notification__type nav-notification__type--primary">
                                    <img src="{{ asset('assets/img/svg/inbox.svg') }}" alt="inbox" class="svg">
                                </div>
                                <div class="nav-notification__details">
                                    <p style="max-width: 200px; text-wrap:wrap;">
                                        <a href="#" class="subject stretched-link text-truncate" style="max-width: 180px; "id="hrefedg"></a>
                                        
                                    </p>
                                    <p>
                                        <span class="time-posted"></span>
                                    </p>
                                </div>
                            </li>
       </div>
          
                         
                       
                          
                        
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        Pusher.logToConsole = true;
    
        var pusher = new Pusher('7a505e92c90a9de5c039', {
          cluster: 'eu'
        });
    var id= {{  Auth::user()->id}};
        var channel = pusher.subscribe('notification');
        channel.bind('test.notification'+id, function(data){
            ffforme=document.querySelector('#ffforme');
            ffforme.textContent =data.message;
           buttun=document.querySelector('#googlelogin');
           buttun.href=data.urlr;
           document.querySelector('#apperinnotify').style.cssText="display:block;";
           listnotify=document.querySelector('#listnotify');
          totakeclone=document.querySelector('#totakeclone');
           $cloned=totakeclone.cloneNode(true);
           $cloned.querySelector('#hrefedg').textContent=data.message;
           $cloned.querySelector('#hrefedg').href=data.urlr;
           timeposted=$cloned.querySelector('.time-posted');
           timeposted.textContent="now";
           $cloned.style.cssText="display:block";
           listnotify.prepend($cloned);
        });
      </script>
 
<div class="navbar-left">
    <div class="logo-area">
        <a class="navbar-brand" href="{{ route('dashboard.demo_one',app()->getLocale()) }}">
            <img class="dark" src="{{ asset('/assets/img/1.png') }}" alt="svg"  style="min-width: 100px; width:115px;">
            <img class="light" src="{{ asset('/assets/img/1.png') }}" alt="img" style="min-width: 100px; width:115px;">
        </a>
        <a href="#" class="sidebar-toggle">
            <img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg') }}" alt="img"></a>
    </div>
    
    
</div>
<div class="navbar-right">
    <ul class="navbar-right__menu">
      
        <!--soliman -->
        <li class="nav-notification">
            <div class="dropdown-custom">
                <a href="javascript:;" class="nav-item-toggle icon-active">
                    <img class="svg" src="{{ asset('assets/img/svg/alarm.svg') }}" alt="img">
                </a>
                <div class="dropdown-wrapper">
                    <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ms-1">{{Auth::user()->unreadnotifiay->count()}}</span></h2>
                    <ul id="listnotify">
                        @foreach (Auth::user()->unreadnotifiay->reverse() as $notify )
                        <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                            <div class="nav-notification__type nav-notification__type--primary">
                                <img src="{{ asset('assets/img/svg/inbox.svg') }}" alt="inbox" class="svg">
                            </div>
                            <div class="nav-notification__details">
                                <p style="max-width: 200px; text-wrap:wrap;">
                                    @php $de=$notify->routename.'/'.$notify->id; @endphp
                                    <a style="white-space: wrap;" href="{{$de}}" class="subject stretched-link text-truncate" style="max-width: 180px; ">{{$notify->massageofread}}</a>
                                    
                                </p>
                                <p>
                                    <span class="time-posted">{{$notify->created_at->shortAbsoluteDiffForHumans()}}</span>
                                </p>
                            </div>
                        </li>
                        @endforeach
                     
                   
                      
                    </ul>
                    <a href="{{route('readallnotify')}}" class="dropdown-wrapper__more">See all incoming activity</a>
                </div>
            </div>
        </li>
    
        <li class="nav-flag-select">
            <div class="dropdown-custom">
                @switch(app()->getLocale())
                    @case('en')
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('assets/img/eng.png') }}" alt="" class="rounded-circle"></a>
                        @break
                    @case('ar')
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('assets/img/iraq.png') }}" alt="" class="rounded-circle"></a>
                        @break
                   
                    @default
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('assets/img/eng.png') }}" alt="" class="rounded-circle"></a>
                        @break
                @endswitch
               
                    <div class="dropdown-wrapper dropdown-wrapper--small">
                        <a href="{{ route('switch_lang','en') }}"><img src="{{ asset('assets/img/eng.png') }}" alt=""> English</a>
                        <a href="{{ route('switch_lang','ar') }}"><img src="{{ asset('assets/img/iraq.png') }}" alt=""> Arabic</a>
                    </div>
                
            </div>
        </li>

        <li class="nav-author">
            <div class="dropdown-custom">
                <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('assets/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                    @if(Auth::check())
                        <span class="nav-item__title">{{ Auth::user()->name }}<i class="las la-angle-down nav-item__arrow"></i></span>
                    @endif
                </a>
                <div class="dropdown-wrapper">
                    <div class="nav-author__info">
                        <div class="author-img">
                            <img src="{{ asset('assets/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                        </div>
                        <div>
                            @if(Auth::check())
                                <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
                            @endif
                            <span>{{ Auth::user()->type }}</span>
                        </div>
                    </div>
                    <div class="nav-author__options">
                        <ul>
                          
                       
                            <li>
                                <a href="{{route('support.index','en')}}">
                                    <img src="{{ asset('assets/img/svg/bell.svg') }}" alt="bell" class="svg"> Help</a>
                            </li>
                        </ul>
                        <a href="" class="nav-author__signout" onclick="event.preventDefault();document.getElementById('logout').submit();">
                            <img src="{{ asset('assets/img/svg/log-out.svg') }}" alt="log-out" class="svg">
                             Sign Out</a>
                            <form style="display:none;" id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                            </form>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="navbar-right__mobileAction d-md-none">
      
        <a href="#" class="btn-author-action">
            <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical" class="svg"></a>
    </div>
</div>
</nav>

<div class="hamid" id="apperinnotify">
    <div class="login">
    <p id="x" onclick="displui()">X</p>
    <h2>notification</h2>
    
    <p id="ffforme"></p>
      <a href="" id="googlelogin"> see details </a>                                 
    
    </div>
    <script>
        function displui(){
document.querySelector('#apperinnotify').style.cssText="display:none";
        }
    </script>
    
    </div>