<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
       
      
        
        
      
  
 
      
    
        <li>
            <a href="{{ route('dashboard.demo_one',app()->getLocale()) }}" class="i">
                <span class="nav-icon uil uil-dashboard"></span>
                <span class="menu-text">  لوحه التحكم</span>
               
            </a>
          
        </li>
   
       
      @can('profile.management')  
        <li>
            <a href="{{ route('profile.management',app()->getLocale()) }}" class="i">
                <span class="nav-icon uil uil-user"></span>
                <span class="menu-text"> {{trans('Profile Management')}}</span>
           
            </a>
        </li>
        @endcan
@can('listing.all')
        <li class="has-child">
            <a href="#" class="i">
                <span class="nav-icon uil uil-database"></span>
                <span class="menu-text">{{ trans('Manage lists')}}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a  href="{{ route('admin.study.type',app()->getLocale()) }}">{{trans('educational system')}}</a></li>
                <li><a class="" href="{{ route('listing.grade',app()->getLocale()) }}">{{trans('Classes')}}</a></li>
                <li><a class="" href="{{ route('listing.activites',app()->getLocale()) }}">{{trans('services')}}</a></li>
                <li><a class="" href="{{ route('listing.courses',app()->getLocale()) }}">{{trans('courses')}}</a></li>


            </ul>
        </li>
@endcan
       @can('contract.index')
        <li class="has-child">
            <a href="#" class="er">
                <span class="nav-icon uil uil-file"></span>
                <span class="menu-text">
                   {{ trans('Contracts and Agreements')}}</span>
                <span class="toggle-icon"></span>
            </a>
            <ul>
                <li><a class="active" href="{{ route('contract.index',app()->getLocale()) }}"> {{trans('Contracts and Agreements')}}</a></li>
                <li><a  href="{{ route('contract.index',[app()->getLocale(),'new']) }}"> {{trans('New contracts')}}</a></li>
                <li><a  href="{{ route('contract.index',[app()->getLocale(),'approved']) }}"> {{trans('Approved contracts')}}</a></li>
                <li><a href="{{ route('contract.index',[app()->getLocale(),'rejected']) }}"> {{trans('Rejected contracts')}}</a></li>
                <li><a  href="{{ route('contract.index',[app()->getLocale(),'study']) }}"> {{trans('Contracts under study')}}</a></li>
                
            </ul>
        </li>
               
       @endcan
       @can('Payments.index')
        <li >
            <a href="{{ route('Payments.index',app()->getLocale()) }}" class="er">
                <span class="nav-icon uil uil-wallet"></span>
                <span class="menu-text">
                   {{ trans('Payment tracking')}}</span>
          
            </a>
          
        </li>
                   
       @endcan
     @can('school.management')
     <li>
        <a href="{{route('chat.from.parent',app()->getLocale())}}" class="er">
            <span class="nav-icon uil uil-user"></span>
            <span class="menu-text">
                {{ trans('Parent interactions')}}</span>
           
        </a>
      
    </li>
     @endcan
      @can('support.index')
        <li >
            <a href="{{route('support.index',app()->getLocale())}}" class="i">
                <span class="nav-icon uil uil-headphones"></span>
                <span class="menu-text"> {{ trans('technical support')}} </span>
             
            </a>
            
        </li>
        @endcan
        @can('school.management')
        <li>
            <a href="{{route('school.management',app()->getLocale())}}" class="i">
                <span class="nav-icon uil uil-headphones"></span>
                <span class="menu-text">{{ trans('users management')}}</span>
             
            </a>
           
        </li>    
        @endcan
        <li>
            <a href="{{route('school.createreport',app()->getLocale())}}" class="i">
                <span class="nav-icon uil uil-file"></span>
                <span class="menu-text">{{ trans('Reports')}}</span>
             
            </a>
           
        </li>
       
        <li>
            <a href="{{route('all.notification',app()->getLocale())}}" class="active">
                <span class="nav-icon uil uil-comment-dots"></span>
                <span class="menu-text"> {{ trans('Notifications')}} </span>
                @if (Auth::user()->unreadnotifiay->count() > 0)
                <span class="badge badge-success menuItem rounded-circle">{{Auth::user()->unreadnotifiay->count()}}</span>
                @endif
            </a>
            
        </li>
    </ul>
</div>
