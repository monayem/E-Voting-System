<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script>
	function approveCandidate(id){
		var id = id;
		$.ajax({
			type:"post",
			url: "{{route('approveCandidate')}}",
			data: {'_token':'{{csrf_token()}}',id:id},
			success: function(data){
                $("."+id+"_approveCandidate").remove();

                    // if(data ==0){
                    //     $("tbody").append("<td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No data available in table</td>")
                    // }
                }
            });
	}

	function disapproveCandidate(id){
		var id = id;
		$.ajax({
			type:"post",
			url: "{{route('disapproveCandidate')}}",
			data: {'_token':'{{csrf_token()}}',id:id},
			success: function(data){
                $("."+id+"_approveCandidate").remove();

                    // if(data ==0){
                    //     $("tbody").append("<td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No data available in table</td>")
                    // }
                }
            });
	}

    function verifyVoter(id){
        var id = id;
        $.ajax({
            type:"post",
            url: "{{route('verifyVoter')}}",
            data: {'_token':'{{csrf_token()}}',id:id},
            success: function(data){
                $("."+id+"_verifyVoter").remove();

                    // if(data ==0){
                    //     $("tbody").append("<td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No data available in table</td>")
                    // }
                }
            });
    }

    function unverifyVoter(id){
        var id = id;
        $.ajax({
            type:"post",
            url: "{{route('unverifyVoter')}}",
            data: {'_token':'{{csrf_token()}}',id:id},
            success: function(data){
                $("."+id+"_unverifyVoter").remove();

                    // if(data ==0){
                    //     $("tbody").append("<td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No data available in table</td>")
                    // }
                }
            });
    }

</script>

{{--Cover Preview Starts Here--}}
<script>
    $("#partyLogo").change(function () {
        	//alert('test');
            var reader = new FileReader();
            reader.onload = function(e){
                // $("#coverPreview").show();
                $('#logoPreviewLabel').removeAttr('hidden');
                $('#logoPreview').removeAttr('hidden');
                document.getElementById("image").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });


    $("#eventBanner").change(function () {
            //alert('test');
            var reader = new FileReader();
            reader.onload = function(e){
                // $("#coverPreview").show();
                $('#eventBannerPreviewLabel').removeAttr('hidden');
                $('#eventBannerPreview').removeAttr('hidden');
                document.getElementById("image").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });


    </script>
    {{--Cover Preview Ends Here--}}

    <script type="text/javascript">
    //alert('test');
    $('#successMessage').delay(3000).fadeOut('slow');
</script>

<script>

    function editEvent(id){
        var eventName = $("."+id+"_eventName").text();
        var eventDescription = $("."+id+"_eventDescription").text();
        $("#edit_event_name").val(eventName);
        $("#edit_event_description").val(eventDescription);
        $("#edit_id").val(id);
    }

    function deleteEvent(id){
        $("#eventId").val(id);
    }




    $("#update").submit(function(e){
     e.preventDefault();
     var id = $("#edit_id").val();
     var eventName = $("#edit_event_name").val();
     var eventDescription = $("#edit_event_description").val();
            // alert(address);
            $.ajax({
                type:"post",
                url: "{{route('updateEvent')}}",
                data: {'_token':'{{csrf_token()}}',id:id, eventName:eventName, eventDescription:eventDescription},
                success:function(data){
                    $("."+id+"_eventName").text(eventName);
                    $("."+id+"_eventDescription").text(eventDescription);
                    alert('Event Updated Successfully');
                    $("#closeAfter").click();
                }
            });

        });


    $("#deleteEvent").click(function(e){
        e.preventDefault();
        var eventId = $("#eventId").val();
        $.ajax({
            type:"post",
            url: "{{route('deleteEvent')}}",
            data: {'_token':'{{csrf_token()}}',eventId:eventId},
            success: function(data){
                $("."+eventId+"_eventName").parent().remove();
                $("#closeDelete").click();
            }
        });
    });

</script>