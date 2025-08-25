<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">



</div>

    <!-- Footer -->

    <footer class="content-footer footer bg-footer-theme">

    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

    <div class="mb-2 mb-md-0">

    &#169; <?php echo date("Y"); ?> 

    </div>

    <div>

    <a class="footer-link me-2">Nefes21 Player <span class="h6 text-primary">V.1.0</span></a>

    </div>

    </div>

    </footer>

    <!-- / Footer -->

</div>

</div>

<div class="modal modal-blur fade" id="del-confirm" tabindex="-1" role="dialog" aria-hidden="true">

   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

      <div class="modal-content">

         <div class="modal-body">

            <div class="modal-title">Are you sure?</div>

            <div>Are you sure you want to delete this <span class="ctxt"></span> ?</div>

         </div>

         <div class="modal-footer">

            <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>

            <a href="javascript:void(0)" id="del-link" class="btn btn-danger dlo" >Yes, delete</a>

         </div>

      </div>

   </div>

</div>

<script>

   PROOT  = '<?=PROOT?>';

</script>

<!-- Libs JS -->

<script src="<?=getLayoutsURI()?>/assets/libs/jquery/dist/jquery.min.js"></script>

<script src="<?=getLayoutsURI()?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?=getLayoutsURI()?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>

<!-- Tabler Core -->

<script src="<?=getLayoutsURI()?>/assets/js/tabler.min.js"></script>

<script src="<?=getLayoutsURI()?>/assets/js/jquery-ui.min.js"></script>

<script src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

<script src="<?=getLayoutsURI()?>/assets/js/custom.js?v=2.2"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->

<?php if($this->action == 'dashboard'): ?>

<script>

   // @formatter:off

   document.addEventListener("DOMContentLoaded", function () {

   	window.ApexCharts && (new ApexCharts(document.getElementById('links-status'), {

   		chart: {

   			type: "donut",

   			fontFamily: 'inherit',

   			height: 240,

   			sparkline: {

   				enabled: true

   			},

   			animations: {

   				enabled: false

   			},

   		},

   		fill: {

   			opacity: 1,

   		},

   		series: [<?=implode(',',array_values($this->data['data']['rft']))?>],

   		labels: ["Active", "Pasued", "Broken"],

   		grid: {

   			strokeDashArray: 4,

   		},

   		colors: ["#00d2d3", "#556ee6", "#ff3f3f"],

   		legend: {

         show: true,

   			position: 'bottom',

   			height: 32,

   			offsetY: 8,

   			markers: {

   				width: 8,

   				height: 8,

   				radius: 100,

   			},

   			itemMargin: {

   				horizontal: 8,

   			},

         

   		},

   		tooltip: {

   			fillSeriesColor: false

   		},

   	})).render();

   });

   // @formatter:on

</script>

<script>

   // @formatter:off

   document.addEventListener("DOMContentLoaded", function () {

   	window.ApexCharts && (new ApexCharts(document.getElementById('servers-usage'), {

   		chart: {

   			type: "donut",

   			fontFamily: 'inherit',

   			height: 240,

   			sparkline: {

   				enabled: true

   			},

   			animations: {

   				enabled: false

   			},

   		},

   		fill: {

   			opacity: 1,

   		},

   		series: [<?=implode(',',array_values($this->data['data']['serL'][0]))?>],

   		labels: ["<?=implode('","',array_values($this->data['data']['serL'][1]))?>"],

   		grid: {

   			strokeDashArray: 4,

   		},

   		legend: {

         show: true,

   			position: 'bottom',

   			height: 32,

   			offsetY: 8,

   			markers: {

   				width: 8,

   				height: 8,

   				radius: 100,

   			},

   			itemMargin: {

   				horizontal: 8,

   			},

         

   		},

   		tooltip: {

   			fillSeriesColor: false

   		},

   	})).render();

   });

   // @formatter:on

</script>

<?php endif; ?>

<script>

   document.body.style.display = "block";

</script>

</body>

</html>