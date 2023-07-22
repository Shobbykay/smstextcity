/*

Jscript::PingManagement

Updated By: 21/09/2018
Created By: Kayode Shobalaje

Owned By: Ping-Express

*/

$(function(){
    
    var modal_loader = '<div class="sm-loader">'+$(".showbox-bg .loader").html()+'</div><br>';

    $('#tables').DataTable({});
    
    $(document).keyup(function(e) {
      if (e.keyCode === 13){}    // enter
      if (e.keyCode === 27){
          loaderHide();
      }   // esc
    });
    
    //initializerz
    $('.records').DataTable();
    
    //loader
    function loaderShow(){
        $(".showbox-bg").fadeIn("fast");
    }
    
    function loaderHide(){
        $(".showbox-bg").fadeOut("fast");
    }
    
    //modal
    
    $(document).on('click','.md-trigger', function(el){
        
        var modal = $('#'+$(this).attr('data-modal'));
        var clos = $('.md-close');
        var overlay = $('.md-overlay');
        
        modal.addClass('md-show');
    });
    $(document).on('click','.md-close', function(el){
        
        el.stopPropagation();
        removeModal();
    });
    $(document).on('click','.md-overlay', function(el){
        
        el.stopPropagation();
        removeModal();
    });
    
    function removeModal(){
        var modal = $('#modal-7');
        modal.removeClass('md-show');
    }
    
    //menu clicks                 
    $('body').on('click','button#pingsales', function(){
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#chargeback").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#events").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#funding").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-20 p-t-20">Processing</div>');
        
        
        $(".contents").load("./tabs/pingsales/board.php", function(response, status, xhr){
            if (status=='success'){
                $('#records_contracts').DataTable({});                
                loaderHide();
            }else{
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading contracts data. Please refresh this page</div>');
            }
            loaderHide();
        });
        
        
    });
    
    $('#datatables-log').dataTable();
 
    
    $('body').on('click','button#chargeback', function(){
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#pingsales").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#events").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#funding").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-20 p-t-20">Processing</div>');
        
        
        $(".contents").load("./tabs/chargeback/board.php", function(response, status, xhr){
            //console.log("responses:"+response+status+xhr);
//            alert(response+' '+status+' '+xhr);

            if (status=='success'){
                $('#records_chargeback').DataTable({});
                
                loaderHide();
            }else{
//                alert('Error loading Chargeback Log data. Please refresh this page');
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading chargeback data. Please refresh this page</div>');
            }
            loaderHide();
        });
    });
    
    $('body').on('click','button#events', function(){
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#pingsales").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#chargeback").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#funding").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-20 p-t-20">Processing</div>');
        
        
        $(".contents").load("./tabs/events/board.php", function(response, status, xhr){
            //console.log("responses:"+response+status+xhr);
//            alert(response+' '+status+' '+xhr);

            if (status=='success'){
                $('#records_chargeback').DataTable({});
                
                loaderHide();
            }else{
//                alert('Error loading Chargeback Log data. Please refresh this page');
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading events data. Please refresh this page</div>');
            }
            loaderHide();
        });
    });
    
//    $(document).on('click','button.btn-funding', function(){
//        $(".md-modal.md-content").load("./tabs/funding/modal_funding.php", function(response, status, xhr){
//            console.log(status+response);
//        });
//    });
    
    $('body').on('click','button#funding', function(){
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#pingsales").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#chargeback").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#events").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-20 p-t-20">Processing</div>');
        
        //load analysis
//        var fund_cur_first=$('body').find('#fundpills').html();
////        var fund_cur_first=$("#fundpills button.btn-info:first-child").attr("data-cur");
//        alert(fund_cur_first);
//        $('body').find('#cbox_funding').html(modal_loader);
//
//        $('body').find('#cbox_funding').load("./tabs/funding/analysis.php?cur="+fund_cur_first, function(response, status, xhr){
//            if (status=='success'){}else{
//                $('body').find('#cbox_funding').html('<br><br><br>Error loading data, please try again/reload webpage.');
//            }
//
//        });
        
        
        $(".contents").load("./tabs/funding/board.php", function(response, status, xhr){

            if (status=='success'){
                $('#fundpills button:first-child').click();
                $('#records_funding').DataTable({});
                loaderHide();
            }else{
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading funding data. Please refresh this page</div>');
            }
            loaderHide();
        });
    });
    
    //end of menu clicks
    
    /*
    Pingsales Add new modal
    
    */
    $(document).on('change','#cct_client_name', function(){
        //flip address
        var clt_addr=$("#cct_client_name option:selected").attr("data-valx");
        $("#cct_client_address").val(clt_addr);
        $("#cct_client_address").html(clt_addr);

        $("#cct_keycontact").load("keycontacts.php?company="+$(this).val(), function(response, status, xhr){
            if (status=='success'){
                if (response=='no contacts'){

                    $("#cct_keycontact").empty();
                    $("#cct_keycontact").html();
                    $("#cct_keycontact").append($('<option>', {
                        value: '',
                        text : 'no contacts'
                    }));
                }
                else{
                    var obj = jQuery.parseJSON( response );
                    //wipe options
                    console.log(obj);
                    $("#cct_keycontact").empty();
                    $("#cct_keycontact").html();
                    $(obj).each(function(index){
                        $("#cct_keycontact").append($('<option>', {
                            value: obj[index].email,
                            text : obj[index].name
                        }));
                        //alert(obj[index].email);
                    });
                }
            }else{
                alertify.error('Error loading company contacts. Please reselect');
            }
        });
    });
    
    $(document).on('click','.view_psales', function(){
        $(".modal-title").html("Pingsales Record");
        $("#myModal").modal('show');
        $("#view-modal-lg-contact").html(modal_loader);        
        var id=$(this).attr("data-xxl");
        $("#view-modal-lg-contact").load("./tabs/pingsales/viewcontract.php?id="+id, function(response, status, xhr){
            $(".modal-title").html("Pingsales Record");
            if (status=='success'){}
            else{
                $("#view-modal-lg-contact").html('Error loading data, please try again');
            }
        });
    });
    
    $(document).on('click','.delete_', function(){
        //delete
        var id=$(this).attr("data-xxl");
        var tid=$(this).attr("data-type");
        
        alertify.confirm("Delete this Record? This cannot be undone",
            function(){
                loaderShow();
                var fd=new FormData();
                fd.append("tbid",tid);//key,value
                fd.append("id",id);//key,value
            
                $.ajax({
                    url: "./api/functions/delete_.php",
                    type: "POST",
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        console.log(data);
                        var data = jQuery.trim(data);
                        var data = jQuery.parseJSON(data);
                        knotifier.success(data.msg);
                        
                        
                        setTimeout(function(){
                            location.reload();
                        },2300);
                    },
                    error: function(data,msg,status){
                        knotifier.error("An error occured while updating record.");
                        loaderHide();
                    }
                });
            },
            function(){
                //cancel
                loaderHide();
            });
    });
    
    /*
    PingSales Contract Filter Tabs
    
    1. Supervisor
    
    */
    $(document).on('change','#sup-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.contract_data').load("./tabs/pingsales/filter.php?clm=supervisor&data-val="+sup, function(response, status, xhr){
                
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading contracts data. Please refresh this page');
                }
            });
        }
        loaderHide();
    });
    
    $(document).on('change','#resp-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.contract_data').load("./tabs/pingsales/filter.php?clm=responsibility&data-val="+sup, function(response, status, xhr){
                
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading contracts data. Please refresh this page');
                }
            });
        }
        loaderHide();    
    });
    
    $(document).on('change','#nda-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.contract_data').load("./tabs/pingsales/filter.php?clm=nda_signed&data-val="+sup, function(response, status, xhr){
                
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading contracts data. Please refresh this page');
                }
            });
        }
        loaderHide();    
    });
    
    $(document).on('change','#dd-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.contract_data').load("./tabs/pingsales/filter.php?clm=dd_completed&data-val="+sup, function(response, status, xhr){
                
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading contracts data. Please refresh this page');
                }
            });
        }
        loaderHide();    
    });
    
    $(document).on('change','#status-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.contract_data').load("./tabs/pingsales/filter.php?clm=status&data-val="+sup, function(response, status, xhr){
                
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading contracts data. Please refresh this page');
                }
            });
        }
        loaderHide();    
    });
    
    
    /*
    Funding Filter Tabs
    
    1. Date Range
    2. Partner Name
    3. Tnx Currency
    4. Tnx Type
    */
    
    $(document).on('click','#funding_dategob', function(){
        //funding created date
        var exp=$("#funding_date_filter").val();
        var vale=exp.replace(' - ','-');
        loaderShow();
        
        if (vale=='--'){loaderHide();}
        else if (vale==''){loaderHide();}
        else{
                $('body').find('.records_funding_data').load("./tabs/funding/filter_date.php?clm=ddate&data-val="+vale, function(response, status, xhr){

                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading funding data. Please refresh this page');
                }
            });
        }
    });
    
    $(document).on('change','#filter_fnd_partner', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
            $('body').find('.records_funding_data').load("./tabs/funding/filter.php?clm=partner_name&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                   loaderHide();
                }else{
                    alertify.error('Error loading funding data. Please refresh this page');
                }
            });
        }
        
        loaderHide();
    });
    
    $(document).on('change','#filter_fnd_txcurr', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_funding_data').load("./tabs/funding/filter.php?clm=tx_curr&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading funding data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#filter_fnd_type', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_funding_data').load("./tabs/funding/filter.php?clm=tx_type&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading funding data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#filter_fnd_status', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_funding_data').load("./tabs/funding/filter.php?clm=status&data-val="+sup, function(response, status, xhr){
                    console.log(status);
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading funding data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#lastupdd-filter-fnd', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_funding_data').load("./tabs/funding/filter.php?clm=last_updated_by&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading funding data. Please refresh this page');
                }
            });
        }
    });
    
    /*
    Events Tab
    
    1. View Details link
    2.
    
    */
    
    //load view details link mode
    $(document).on('click','.vvdd_ech', function(){
        $(".modal-titlechg").html("Loading Event Record");
        $("#myModalchg").modal('show');
        $("#view-modal-lg-chg").html(modal_loader);  
        var id=$(this).attr("data-xxl");
        $("#view-modal-lg-chg").load("./tabs/events/view_details.php?id="+id, function(response, status, xhr){
            $(".modal-titlechg").html("Event Record Details");
            if (status=='success'){}
            else{
                //alert('Error loading details. Please reselect');
                $("#view-modal-lg-chg").html('Error loading data, please try again');
            }

        });
    });
    
    $(document).on('click','.view_reca,.view_rec', function(){
        $(".modal-titlechg").html("Event Record");
        $("#myModalchg").modal('show');
        $("#view-modal-lg-chg").html(modal_loader);        
        var id=$(this).attr("data-xxl");
        $("#view-modal-lg-chg").load("./tabs/events/vieweventrec.php?id="+id, function(response, status, xhr){
            $(".modal-titlechg").html("Event Record");
            if (status=='success'){}
            else{
                $("#view-modal-lg-chg").html('Error loading data, please try again');
            }

        });
    });
    
    $(document).on('click','#edtrecevt', function(){
        $('input:disabled').removeAttr('disabled');
        $("input#lupdaa").prop('disabled', true);
        $("input#lupdbb").prop('disabled', true);
        $("#hguyre").html('WRITE');
        $('select:disabled').removeAttr('disabled');
        $('button:disabled').removeAttr('disabled');
        $(this).hide();
    });
    
    $(document).on('change','#recura', function(){
        var val=$(this).val();
        if (val=="yes"){
            $("#expana").show();
        }else{
            $("#expana").hide();
        }
    });
    
    $(document).on('click','.delete_eevt_', function(){
        var tb=$(this).attr("data-type");
        var id=$(this).attr("data-xxl");
        var option=$(this).attr("data-old");
        alertify.confirm("Delete this event Record? This cannot be undone",
            function(){
                loaderShow();
                var fd=new FormData();
                fd.append("modal_id","modal_delete");//key,value
                fd.append("keyid",id);//key,value
                fd.append("tbl",tb);//key,value
            
                $.ajax({
                    url: "templates/controller.php",
                    type: "POST",
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        if (data=='success'){
                            alertify.success('Delete Event Record successfully');
                        }
                        else{
                            alertify.error(data);                            
                        }
                        setTimeout(function(){
                            location.reload();
                        },2300);
                    },
                    error: function(data,msg,status){
                        alertift.error(data+msg+status);
                    }
                });
                loaderHide();
            },
            function(){
                //alertify.error('Delete Canceled');//cancel triggered
            });
    });
    
    $(document).on('change','#recur-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
            $('body').find('.records_events_data').load("./tabs/events/filter.php?clm=recurring&data-val="+sup, function(response, status, xhr){
                if (status=='success'){}else{
                    alertify.error('Error loading events data. Please refresh this page');
                }
                loaderHide();
            });
        }
    });
    
    $(document).on('change','#coun-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_events_data').load("./tabs/events/filter.php?clm=eventcountry&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#resp-ev-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_events_data').load("./tabs/events/filter.php?clm=responsibility&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#lastupdd-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_events_data').load("./tabs/events/filter.php?clm=last_updated_by&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#appr-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_events_data').load("./tabs/events/filter.php?clm=approved&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('change','#stts-filter', function(){
       var sup=$(this).val();
        loaderShow();
        
        if (sup=='--'){loaderHide();}
        else{
                $('body').find('.records_events_data').load("./tabs/events/filter.php?clm=status&data-val="+sup, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('click','#datego-event', function(){
        //event date
        var exp=$("#date_evvfilter").val();
        var vale=exp.replace(' - ','-');
        loaderShow();
        
        if (vale=='--'){loaderHide();}
        else if (vale==''){loaderHide();}
        else{
            $('body').find('.records_events_data').load("./tabs/events/filter_date.php?clm=eventdate&data-val="+vale, function(response, status, xhr){
                if (status=='success'){loaderHide();}
                else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    $(document).on('click','#dategolupd-event', function(){
        //last updated date
        var exp=$("#date_evhyufilter").val();
        var vale=exp.replace(' - ','-');
        loaderShow();
        
        if (vale=='--'){loaderHide();}
        else if (vale==''){loaderHide();}
        else{
            $('body').find('.records_events_data').load("./tabs/events/filter_date.php?clm=last_updated_date&data-val="+vale, function(response, status, xhr){
                if (status=='success'){loaderHide();}
                else{
                    alertify.error('Error loading events data. Please refresh this page');
                }

            });
        }
    });
    
    //end of events tab filter
    
    //start of chargeback
    $(document).on('click','.view-chargeback', function(){
        $(".modal-titlechg").html("Loading Chargeback Record");        
        $(".evt-sv").hide();
        $("#myModalchg").modal('show');
        $("#view-modal-lg-chg").html(modal_loader);  
        var id=$(this).attr("data-xxl");
        $("#view-modal-lg-chg").load("./tabs/chargeback/viewchg.php?caseid="+id, function(response, status, xhr){
            $(".modal-titlechg").html("Chargeback Record");
            if (status=='success'){}else{
                $("#view-modal-lg-chg").html('Error loading data, please try again');
            }

        });
    });
    
    $(document).on('click','#goexp_date_chr', function(){  
        var exp=$("#dtelstupdch-filter").val();
        var vale=exp.replace(' - ','-');
        loaderShow();
        
        if (vale=='--'){loaderHide();}
        else if (vale==''){loaderHide();}
        else{
            $('body').find('.chargeback-rec').load("./tabs/chargeback/filter_date_charge.php?clm=date_last_updated&data-val="+vale, function(response, status, xhr){
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading chargeback data. Please refresh this page');
                }
            });
        }
        loaderHide();
    });
    
    $(document).on('click','#datego_chargeback', function(){  
        var exp=$("#duedate_chg_filter").val();
        var vale=exp.replace(' - ','-');
        loaderShow();
        
        if (vale=='--'){loaderHide();}
        else if (vale==''){loaderHide();}
        else{
            $('body').find('.chargeback-rec').load("./tabs/chargeback/filter_date_charge.php?clm=due_date&data-val="+vale, function(response, status, xhr){
                if (status=='success'){loaderHide();}else{
                    alertify.error('Error loading chargeback data. Please refresh this page');
                }
            });
        }
        loaderHide();
    });
    
    $(document).on('change','#etz-filter', function(){
       var resp=$(this).val();
       var col=$(this).attr("data-tfb");
        loaderShow();
        
        if (resp=='--'){loaderHide();}
        else{
           $('body').find('.chargeback-rec').load("./tabs/chargeback/filter_charge.php?clm="+col+"&data-val="+resp, function(response, status, xhr){
                if (status=='success'){loaderHide();}else{
                    loaderHide();
                    alertify.error('Error loading chargeback data. Please refresh this page');
                }

            });
        }        
    });
    
    $(document).on('change','#emrec-filter', function(){
       var resp=$(this).val();
       var col=$(this).attr("data-tfb");
       loaderShow();
        
        if (resp=='--'){loaderHide();}
        else{
            $('body').find('.chargeback-rec').load("./tabs/chargeback/filter_charge.php?clm="+col+"&data-val="+resp, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading chargeback data. Please refresh this page');
                }

            });
        }
        loaderHide();
    });
    
    $(document).on('change','#stt-filter', function(){
       var resp=$(this).val();
       var col=$(this).attr("data-tfb");
        loaderShow();
        
        if (resp=='--'){loaderHide();}
        else{
                $('body').find('.chargeback-rec').load("./tabs/chargeback/filter_charge.php?clm="+col+"&data-val="+resp, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading chargeback data. Please refresh this page');
                }

            });
        }
        loaderHide();
    });
    
    $(document).on('change','#cur-filter', function(){
       var resp=$(this).val();
       var col=$(this).attr("data-tfb");
       loaderShow();
        
        if (resp=='--'){loaderHide();}
        else{
                $('body').find('.chargeback-rec').load("./tabs/chargeback/filter_charge.php?clm="+col+"&data-val="+resp, function(response, status, xhr){
                if (status=='success'){
                    loaderHide();
                }else{
                    alertify.error('Error loading chargeback data. Please refresh this page');
                }
            });
        }
        loaderHide();
        
    });
    
    $(document).on('click','.edt_rec_evt', function(){
        $('input:disabled').removeAttr('disabled');
//        $("input#lupdaa").prop('disabled', true);
//        $("input#lupdbb").prop('disabled', true);
        $("#evt_mode").html('WRITE');
        $(".evt-sv").show();
        $('select:disabled').removeAttr('disabled');
        $('button:disabled').removeAttr('disabled');
        $('textarea').removeAttr('disabled');
//        $('a#add_bank_cax').removeClass('d-none');
//        $('a#add_nabank_c').removeClass('d-none');
        $(this).hide();
    });
    //end of chargeback
    
    //funding tab
    $(document).on('click',".sum_fund_tab", function(){
        var cur_val=$(this).attr("data-cur");
        
        $(".sum_fund_tab").removeClass("btn-info box-shadow-2").addClass("btn-link");
        $(this).addClass("btn-link").removeClass("btn-link").addClass("btn-info box-shadow-2");
        
        $('body').find('#cbox_funding').html(modal_loader);
        
        $('body').find('#cbox_funding').load("./tabs/funding/analysis.php?cur="+cur_val, function(response, status, xhr){
            if (status=='success'){}else{
                $('body').find('#cbox_funding').html('<br><br><br>Error loading data, please try again/reload webpage.');
            }
        });
        
    });
    //end of funding tab
    
    
    $("a.op-menu").click(function(){
        ///open menu
        $(".menu-side-sl").animate({right: "0px"},500);
    });
    
    $("a.cl-menu").click(function(){
        ///close menu
        $(".menu-side-sl").animate({right: "-200px"},500);
    });
    
    
    //start of settings tab
    $('body').on('click','button#accounts', function(){
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#chgp").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#site").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-020 p-t-20">Processing</div>');        
        
        $(".contents").load("./tabs/settings/accounts/page.php", function(response, status, xhr){
            if (status=='success'){
                $('#acc-datatables').DataTable({});
                
                loaderHide();
            }else{
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading accounts information. Please refresh this page</div>');
            }
            loaderHide();
        });
    });
    
    $('body').on('click','button#chgp', function(){
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#accounts").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#site").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-020 p-t-20">Processing</div>');        
        
        $(".contents").load("./tabs/settings/chgpwd/page.php", function(response, status, xhr){
            if (status=='success'){
//                $('#acc-datatables').DataTable({});
                
                loaderHide();
            }else{
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading change password. Please refresh this page</div>');
            }
            loaderHide();
        });
    });
    
    $('body').on('click','button#site', function(){        
        $(this).removeClass("btn-link").addClass("btn-info box-shadow-2");
        $("button#accounts").addClass("btn-link").removeClass("btn-info box-shadow-2");
        $("button#chgp").addClass("btn-link").removeClass("btn-info box-shadow-2");
        
        loaderShow();
        $(".contents").html('<div class="card-filter m-t-020 p-t-20">Processing</div>');        
        
        $(".contents").load("./tabs/settings/site/page.php", function(response, status, xhr){
            if (status=='success'){
//                $('#acc-datatables').DataTable({});
                $('body').find('.list-group a:first-child').click();//load first item
                
                loaderHide();
            }else{
                $(".contents").html('<div class="card-filter m-t-20 p-t-20">Error loading site data. Please refresh this page</div>');
            }
            loaderHide();
        });
    });
    //end of settings tab
    
    
    
    //loading first tab
//    console.log($('.tabs-btn button:first-child').text());
    $('.tabs-btn button:first-child').click();
})