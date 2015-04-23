
<footer>
    <div id="footer">
        <div class="container">
            <p class="text-muted credit">
                <!--<span class="pull-right">Help</span>-->
                © Brave - 2015
            </p>
        </div>
    </div>
</footer>


@section('header-css')
    <style type="text/css">
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #f5f5f5;
        }

        .footer .container .text-muted {
            margin: 20px 0;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>
@endsection

@section('footer-js')
<script>
	$(document).ready(function()
	{
		$('[data-toggle=tooltip]').tooltip();
		
		$('.moment').each(function(){
			var mr = moment($(this).data('moment'));
			$(this).html(mr.calendar());
		});
		
		$('.deleteButton').on('click', function(e)
		{
			e.preventDefault();
			var link = $(this).attr('href');

			// confirm dialog
			alertify.confirm("Are you sure you want to delete this?", function (ee)
			{
				if (ee)
				{
					// user clicked confirm
					window.location = link;
				}
				else
				{
					// user clicked "cancel", do nothing
				}
			});

			return false;
		});

		setInterval(function()
		{
			$('.time-now').html(moment().format("dddd, MMMM Do YYYY, h:mm:ss a"));
		}, 1000);
	});
</script>
@endsection