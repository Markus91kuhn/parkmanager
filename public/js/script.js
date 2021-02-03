// const { data } = require("jquery");

$(document).ready(function() {

    $('.select').on('click', function() {
        $('.select').removeClass('select_color');
        $(this).addClass('select_color');
        var select_id = ($(this).children('.select_id')).text();
        // console.log(select_id);  
        $("input[name='select']").val(select_id);
    });
    $('#select_parking').on('click', function() {
        var id = $("input[name='select']").val();
        if (id == '') {
            alert('Select item!');
            return false;
        }
    });
    $('#show_zip').on('click', function() {
        var id = $("input[name='select']").val();
        if (id == '') {
            alert('Select Partner!');
            return false;
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#add_zip').on('click', function() {
        var zip_code = $('#zip_code').val();
        var partner_id = $('#partner_id').val();
        var partner_country = $('#partner_country').val();
        console.log(zip_code);
        // var partner_email=$('#partner_eamil').val();
        $.ajax({
            type: "post",
            url: "add_zip",
            data: { zip_code: zip_code, partner_id: partner_id, partner_country: partner_country },
            success: function(data) {
                alert(data.success);
                $('#myModal').modal('toggle');
                location.reload();
            }
        });
    });
    $('#delete').on('click', function() {
        var partner_id = $("#partner_id").val();
        var zip_code = $('#zip_code1').val();
        $.ajax({
            type: "post",
            url: "delete_zip",
            data: { partner_id: partner_id, zip_code: zip_code },
            success: function(data) {
                alert(data.success);
                // $('#myModal').modal('toggle');
                location.reload();
            }
        });
    });
    $('#city-search').on('keyup', function() {
        var city_search = $('#city-search').val();
        // console.log(city_search);
        if (city_search != '') {
            $.ajax({
                type: "post",
                url: "city_search",
                data: { city_search: city_search },
                success: function(data) {
                    // console.log(data.city);
                    if (data.city) {
                        // $('.city_search').(data.city);
                        $('.city_search').text('');
                        $('.city_search').append(data.city);
                        // console.log(data.city);
                    } else {
                        console.log(data.emptydata);
                        $('.city_search').text('');
                        $('.city_search').removeClass('show');
                        // $('.city_search').remove()
                    }
                }
            });
            $('.city_search').addClass('show');
        } else {
            $('.city_search').removeClass('show');
        }

    });
    // $(document).on('change',function(){
    //   $('.city_search').removeClass('show');
    // });
    $('.city_search').on('click', function() {
        var city = $('.city_search').text();
        $('#city-search').val(city);
        $('.city_search').removeClass('show');
    });

    // $('.show_data').on('click',function() {
    //   $('.show_data').removeClass('select_color');
    //   $(this).addClass('select_color');
    //   var select_id=($(this).children('.select_id')).text();   
    //   // console.log(select_id);  
    //   // $("input[name='select']").val(select_id);
    //   $.ajax({
    //     type: "post",
    //     url: "active_data",
    //     data: {case_id:select_id},
    //     success: function(data) {
    //       alert(data.success);
    //       // $('#myModal').modal('toggle');
    //       // location.reload();
    //     }
    // });
    // });
    // $('#complete').on('click', function() {
    //     // alert();
    //     var data1 = {
    //         "aparty": "4917695594803",
    //         "bparty": "4980030090100",
    //         "apikey": "291ce23e5f1274689a13edf57281d051",
    //         "speak": "Dies ist ein Test."
    //     };
    //     // var bparty = '121232132';

    //     // var apikey='tests';
    //     // var speak='test';
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         },
    //         type: "post",
    //         url: 'https://system.woop.la/scripts/clients/MAX001/alertcall/',
    //         // contentType: "application/json; charset=utf-8",
    //         // data: { aparty: '4930xxx15157', bparty: '4930xxx79947', apikey: '291ce23e5f1274689a13edf57281d051', speak: 'Dies ist ein Test.' },
    //         data: { data: data1 },
    //         dataType: "json",
    //         success: function(data) {
    //             alert(data.data.aparty);
    //             return false;
    //             // $('#myModal').modal('toggle');
    //             // location.reload();
    //         },
    //         error: function() {
    //             return false;
    //         }
    //     });
    // });
    $(document).on('change', '.comfirm', function() {
        var userid = (($(this).parents('td')).siblings('.partner_id')).val();
        console.log(userid);
        if (this.checked) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: "comfirm",
                data: { comfirm: 1, userid: userid },
                success: function(data) {
                    console.log(data);
                },
                error: function(e) {
                    // alert();
                    console.log(e);
                }
            });
        } else {
            console.log("checkednt");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: "comfirm",
                data: { comfirm: 0, userid: userid },
                success: function(data) {
                    console.log(data);
                },
                error: function(e) {
                    // alert();
                    console.log(e);
                }
            });
        }
    });
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    // $('input[name="carpark"]').on('click', function() {
    //    if($(this).){

    //    }
    // });

});