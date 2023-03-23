


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
        
            <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
            <canvas id="myChart">
      
            </canvas>
                <div class="card-body">

               

                </div>

            </div>
        </div>
    </div>
</div>


{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart1->renderHtml() !!}


@push('scripts')
