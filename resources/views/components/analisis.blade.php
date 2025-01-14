<div class="col-xxl-12">
    <div class="row">
      <div class="col-xxl-6 col-sm-6 mb-25">
        <!-- Card 1  -->
        
<a href="{{ route('user.orders.package') }}">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">




          <div class="overview-content w-100">
            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
              <div class="ap-po-details__titlebar">
                <h1>{{$order_packages}}</h1>
                <p>العروض الخاصه بك</p>
              </div>
              <div class="ap-po-details__icon-area">
                <div class="svg-icon order-bg-opacity-primary color-primary">

                  <i class="uil uil-briefcase-alt"></i>
                </div>
              </div>
            </div>
            
          </div>


        </div>
      </a>
        <!-- Card 1 End  -->
      </div>
      <div class="col-xxl-6 col-sm-6 mb-25">
        <!-- Card 2 -->
        <a href="{{ route('users.orders.services') }}">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">





          <div class="overview-content w-100">
            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
              <div class="ap-po-details__titlebar">
                <h1>{{$order_services}}</h1>
                <p>الخدمات الخاصه بك</p>
              </div>
              <div class="ap-po-details__icon-area">
                <div class="svg-icon order-bg-opacity-info color-info">

                  <i class="uil uil-file"></i>
                </div>
              </div>
            </div>
            
          </div>

        </div>
        </a>
        <!-- Card 2 End  -->
      </div>
      <div class="col-xxl-6 col-sm-6 mb-25">
        <!-- Card 4  -->
        <a href="##">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
          <div class="overview-content w-100">
            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
              <div class="ap-po-details__titlebar">
                <h1>{{Auth::user()->unreadnotifiay->count()}}</h1>
                <p>الاشعارات</p>
              </div>
              <div class="ap-po-details__icon-area">
                <div class="svg-icon order-bg-opacity-warning color-warning">

                  <i class="uil uil-comment-dots"></i>
                </div>
              </div>
            </div>
           
          </div>

        </div>
        </a>
        <!-- Card 4 End  -->
      </div>
 
    

   
    </div>
  </div>