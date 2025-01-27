<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <li>
            <a href="{{route('home')}}" class="i">
                <span class="nav-icon uil uil-dashboard"></span>
                <span class="menu-text">لوحه التحكم </span>
            </a> 
        </li>
        <li>
            <a href="{{route('admin.testmonial.index')}}" class="i">
                <span class="nav-icon uil uil-user"></span>
                <span class="menu-text">اراء العملاء</span>
               
            </a>
           
        </li>
        <li>
            <a href="{{route('admin.awards.index')}}" class="i">
                <span class="nav-icon uil uil-box"></span>
                <span class="menu-text">الجوائز</span>
               
            </a>
           
        </li>
     
        
        <li>
            <a href="{{ route('governorates.index') }}" class="i">
                <span class="nav-icon uil uil-map-marker"></span>
                <span class="menu-text">المحافظات</span>


            </a>

        </li>
        <li>
            <a href="{{ route('services.index') }}" class="i">
                <span class="nav-icon uil uil-building"></span>
                <span class="menu-text">الخدمات</span>
            </a>
        </li>

        <li>
            <a href="{{ route('sub-services.index') }}" class="i">
                <span class="nav-icon uil uil-building"></span>
                <span class="menu-text">الخدمات الفرعية</span>
            </a>
        </li>

        <li>
            <a href="{{ route('service-posts.index') }}" class="i">
                <span class="nav-icon uil uil-newspaper"></span>
                <span class="menu-text">منشورات الخدمات</span>
            </a>
        </li>
        <li>
            <a href="{{ route('home-posts.index') }}" class="i">
                <span class="nav-icon uil uil-newspaper"></span>
                <span class="menu-text">منشورات الصفحه الرئيسية</span>
            </a>
        </li>

     

        <li>
            <a href="{{ route('contacts.index') }}" class="i">
                <span class="nav-icon uil uil-envelope"></span>
                <span class="menu-text">الرسائل التي تم ارسالها</span>
            <a href="{{route('admin.terms.index')}}" class="i">
                <span class="nav-icon uil uil-file"></span>
                <span class="menu-text">الشروط والخصوصيه</span>

            </a>

        </li>

        <li>
            <a href="{{ route('faqs.index') }}" class="i">
                <span class="nav-icon uil uil-question-circle"></span>
                <span class="menu-text">الاسئله الشائعه</span>
            </a>
        </li>

       
      
       
 
                    <li>
                        <a href="{{route('admin.footer',['type' => 'home'])}}" class="i">
                                <span class="nav-icon uil uil-file"></span>
                                <span class="menu-text">فوتر صفحه الرئيسيه</span>
                               
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.footer',['type' => 'subservices'])}}" class="i">
                                    <span class="nav-icon uil uil-file"></span>
                                    <span class="menu-text">فوتر صفحه الخدمات الفرعيه</span>
                                   
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.footer',['type' => 'services'])}}" class="i">
                                        <span class="nav-icon uil uil-file"></span>
                                        <span class="menu-text">فوتر صفحه الخدمات</span>
                                       
                                    </a>
                                </li>

                    <li>
                        <a href="{{route('end.admin.footer')}}" class="i">
                                <span class="nav-icon uil uil-file"></span>
                                <span class="menu-text">مربعات ال فوتر</span>
                               
                            </a>
                        </li>
                        <li class="has-child">
                            <a href="#" class="er">
                                <span class="nav-icon uil uil-file"></span>
                                <span class="menu-text">
                                    التحكم في صغحه المقالات</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li><a  class="active"  href="{{route('admin.blog.page.index')}}"> تحكم صفحه المقالات</a></li>
                                <li><a href="{{route('admin.blog.index')}}" class="i">المقالات </a></li>
                                <li><a href="{{route('admin.footer',['type' => 'blog'])}}" class="i">فوتر صفحه المقالات</a></li>
                                <li><a href="{{route('end.admin.footer')}}" class="i"> مربعات ال فوتر</a></li>
                            </ul>
                        </li>
                        <li class="has-child">
                            <a href="#" class="er">
                                <span class="nav-icon uil uil-file"></span>
                                <span class="menu-text">التحكم في صغحه  عنا</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li><a href="{{route('admin.about.index')}}" class="active">التحكم في صفحه عنا</a></li>
                                <li> <a href="{{route('admin.footer',['type' => 'about'])}}" class="i">فوتر صفحه عنا</a></li>
                                <li><a href="{{route('end.admin.footer')}}" class="i"> مربعات ال فوتر</a></li>
                            </ul>
                        </li>
                        <li class="has-child">
                            <a href="#" class="er">
                                <span class="nav-icon uil uil-file"></span>
                                <span class="menu-text">التحكم في صغحه الشروط والاحكام</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li><a href="{{route('admin.terms.index')}}" class="active">الشروط والخصوصيه</a></li>
                                <li><a href="{{route('admin.footer',['type' => 'term'])}}" class="i">فوتر صفحه الشروط والاحكام</a></li>
                                <li><a href="{{route('end.admin.footer')}}" class="i"> مربعات ال فوتر</a></li>
                            </ul>
                        </li>

                        <li class="has-child">
                            <a href="#" class="er">
                                <span class="nav-icon uil uil-file"></span>
                                <span class="menu-text">التحكم في صغحه العناوين</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li><a href="{{route('admin.locationheader.index')}}" class="active">التحكم في صفحه العناوين</a></li>
                                <li><a href="{{route('admin.testmonial.index')}}" class="i">اراء العملاء</a></li>
                                <li><a href="{{route('admin.location.description.index')}}" class="i">صفحه العناوين التفاصيل</a></li>
                                <li><a href="{{ route('faqs.index') }}" class="i">الاسئله الشائعه</a></li>
                                <li><a href="{{route('admin.footer',['type' => 'location'])}}" class="i">فوتر صفحه الموقع</a></li>
                                <li><a href="{{route('end.admin.footer')}}" class="i"> مربعات ال فوتر</a></li>
                            </ul>
                        </li>
                

    </ul>
</div>
