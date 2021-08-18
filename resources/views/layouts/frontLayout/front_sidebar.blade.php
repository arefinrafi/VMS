<strong>
<div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              <div class="panel panel-default">
                <?php //..............  ?>
                @foreach($categories as $cat)
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      {{ $cat->name }}
                    </a>
                  </h4>
                </div>
                <div id="{{ $cat->id }}" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      @foreach($cat->categories as $subcat)
                      <li><a href="{{ asset('/vehicles/'.$subcat->url) }}">{{ $subcat->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                @endforeach
              </div>
              
            </div><!--/category-products-->
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Price Range </h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    
                      
                      <a href="{{ URL::to('/PriceRange1') }}"><P> Tk. 500000-1000000</p></a>
                      <a href="{{ URL::to('/PriceRange2') }}"><P> Tk. 1000000-2000000</p></a>
                      <a href="{{ URL::to('/PriceRange3') }}"><P> Tk. 2000000-3000000</p></a>
                      <a href="{{ URL::to('/PriceRange4') }}"><P> Tk. 3000000-5000000</p></a>
                      <a href="{{ URL::to('/PriceRange5') }}"><P> Tk. 5000000 ++</p></a>
                   

                     <!--  <form action="" method="get">
                        {{ csrf_field() }}
                        <input type="text" name="min_price" placeholder="Min" required=""></input><br><br>
                        <input type="text" name="max_price" placeholder="Max" required=""></input><br><br>
                        
                        <button type="submit">OK</button>
                      </form> -->
                     
                   
                  </h4>
                </div>
              </div>
              
            </div><!--/category-products-->
          </div>
        </div>
      </div>
    </div>
    </strong>