<div class="col-xxl-12">
    <div class="row">
      <div class="col-xxl-6 col-sm-6 mb-25">
        <!-- Card 1  -->
        
<a href="{{route('admin.testmonial.index')}}">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">




          <div class="overview-content w-100">
            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
              <div class="ap-po-details__titlebar">
                <h1>{{$testmonials}}</h1>
                <p>اراء العملاء</p>
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
        <a href="{{route('admin.awards.index')}}">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">





          <div class="overview-content w-100">
            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
              <div class="ap-po-details__titlebar">
                <h1>{{$awards}}</h1>
                <p>الجوائز</p>
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
        <!-- Card 2 -->
        <a href="{{route('admin.blog.index')}}">
        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">





          <div class="overview-content w-100">
            <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
              <div class="ap-po-details__titlebar">
                <h1>{{ $articals}}</h1>
                <p>المقالات</p>
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
      

     
    </div>
  </div>