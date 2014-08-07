<!DOCTYPE html>
<html lang="en">
    <head>
        <title id='Description'>Test Anzeigesystem 2</title>
        <link rel="stylesheet" href="/jqwidgets/styles/jqx.base.css" type="text/css" /> 
        <link rel="stylesheet" href="/jqwidgets/styles/jqx.custom.css" type="text/css" />


        <script type="text/javascript" src="/scripts/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxgrid.sort.js"></script>
       <!-- <script type="text/javascript" src="/jqwidgets/jqxgrid.filter.js"></script>-->
        <script type="text/javascript" src="/jqwidgets/jqxgrid.selection.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxpanel.js"></script>
       <!-- <script type="text/javascript" src="/jqwidgets/jqxcheckbox.js"></script> -->
        <script type="text/javascript" src="/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxdropdownlist.js"></script>
       <!-- <script type="text/javascript" src="/scripts/demos.js"></script>-->



<!-- <script type="text/javascript">
     function checklength(i) {
         'use strict';
         if (i < 10) {
             i = "0" + i;
         }
         return i;
     }
         
     var minutes, seconds, count, counter, timer;
     count = 90; //seconds
     counter = setInterval(timer, 1000);
         
     function timer() {
         'use strict';
         count = count - 1;
         minutes = checklength(Math.floor(count / 60));
         seconds = checklength(count - minutes * 60);
         if (count < 0) {
             clearInterval(counter);
             return;
         }
         document.getElementById("timer").innerHTML = 'Naechste Aktualisierung in ' + minutes + ':' + seconds + ' ';
         if (count === 0) {
             location.reload();
         }
     }
 </script>-->
        <script type="text/javascript">
            $(document).ready(function() {


   //             var roomnameSource =
     //                   {
       //                     datatype: "json",
         //                   datafields: [
           //                     {name: 'id', type: 'string'},
             //                   {name: 'name', type: 'string'}
//
  //                          ],
    //                        root: "name",
      //                     // record: "id",
       //                     id: 'id',
         //                   url: "rooms.json" //"/demos/sampledata/employees.json"
                                    //async: false
           //             };
                // prepare the data

 //               var roomnamearraySource =
   //                     {
     //                       datatype: "array",
       //                     datafields: [
         //                       {name: 'id', type: 'string'},
           //                     {name: 'name', type: 'string'}
             //               ],
               //             localdata: roomnameSource
                 //       };

    //            var roomnameAdapter = new $.jqx.dataAdapter(roomnamearraySource, {
      //              autoBind: true
        //        });


                var bookingSource =
                        {
                            datatype: "json",
                            datafields: [
                               // {name: 'Country', value: 'id', values: {source: roomnameAdapter.records, value: 'id', name: 'name'}},
                                {name: 'id'},
                                {name: 'room_name'},
                                {name: 'room_number'},
                                {name: 'multi_id'},
                                {name: 'title'},
                                {name: 'user'}
                                // {name: 'comment'}
                            ],
                            id: 'room',
                            url: "test.json",
                            pager: function(pagenum, pagesize, oldpagenum) {
                                // callback called when a page or page size is changed.
                            },
                            root: 'room',
                            sortcolumn: 'name',
                            sortdirection: 'asc'
                        };






                var dataAdapter = new $.jqx.dataAdapter(bookingSource);

                $("#jqxgrid").jqxGrid(
                        {
                            theme: 'custom',
                            autoheight: true,
                            altrows: true,
                            autowidth: true,
                            source: dataAdapter,
                            pageable: true,
                            sortable: true,
                            columnsresize: false,
                            columns: [
                               // {text: 'Raum', dataField: 'Country', width: 100},
                                {text: 'Studienname', dataField: 'room_name', width: 160},
                                {text: 'Von', dataField: 'room_number', width: 160},
                                {text: 'Bis', dataField: 'multi_id', width: 160},
                                {text: 'Durchfuehrer', dataField: 'title', width: 150, cellsalign: 'right'},
                                {text: 'eMail', dataField: 'user', width: 200, cellsalign: 'right', cellsformat: 'c2'}
                                // {text: 'Kommentar', dataField: 'comment', cellsalign: 'right', minwidth: 300, cellsformat: 'c2'}
                            ]

                        });
                $('#events').jqxPanel({width: 300, height: 80});
                $("#jqxgrid").on("sort", function(event) {
                    $("#events").jqxPanel('clearcontent');
                    var sortinformation = event.args.sortinformation;
                    var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                    if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                        sortdirection = "null";
                    }
                    var eventData = "Triggered 'sort' event <div>Column:" + sortinformation.sortcolumn + ", Direction: " + sortdirection + "</div>";
                    $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
                });
                $('#clearsortingbutton').jqxButton({height: 25});
                $('#sortbackground').jqxCheckBox({checked: true, height: 25});
                // clear the sorting.
                $('#clearsortingbutton').click(function() {
                    $("#jqxgrid").jqxGrid('removesort');
                });
                // show/hide sort background
                $('#sortbackground').on('change', function(event) {
                    $("#jqxgrid").jqxGrid({showsortcolumnbackground: event.args.checked});
                });
                $("#jqxgrid").on("pagechanged", function(event) {
                    $("#eventslog").css('display', 'block');
                    if ($("#events").find('.logged').length >= 5) {
                        $("#events").jqxPanel('clearcontent');
                    }
                    var args = event.args;
                    var eventData = "pagechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + "</div>";
                    $('#events').jqxPanel('prepend', '<div class="logged" style="margin-top: 5px;">' + eventData + '</div>');
                    // get page information.
                    var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
                    $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount + "</div>");
                });
                $("#jqxgrid").on("pagesizechanged", function(event) {
                    $("#eventslog").css('display', 'block');
                    $("#events").jqxPanel('clearcontent');
                    var args = event.args;
                    var eventData = "pagesizechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + ", Old Page Size: " + args.oldpagesize + "</div>";
                    $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
                    // get page information.          
                    var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
                    $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount + "</div>");
                });
            });




        </script>
    </head>
    <body class='default'>

        <div id='jqxWidget' style="font-size: 14px; font-family: sans-serif; float: left;">
            Ueberischt der aktuell laufenden Studien.  <span id="timer"></span><br>
            <br>
            <div id="jqxgrid"></div>
            <div id="eventslog" style="margin-top: 30px;">
                <div style="float: left; margin-right: 10px;">

                </div>
            </div>
        </div>
        <br>
        <br>


    </body>
</html>



<!--
    
//
// JSONP
//
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <title id='Description'>In this example the Grid is bound to a Remote Data.</title>
        <link rel="stylesheet" href="../../jqwidgets/styles/jqx.base.css" type="text/css" />
        <script type="text/javascript" src="../../scripts/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="../../jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="../../jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="../../jqwidgets/jqxgrid.columnsresize.js"></script> 
        <script type="text/javascript">
            $(document).ready(function() {
                // prepare the data
                var source =
                        {
                            datatype: "jsonp",
                            datafields: [
                                {name: 'id', type: 'float'},
                                {name: 'name', type: 'string'},
                                {name: 'type', type: 'string'},
                                {name: 'seats', type: 'float'},
                                {name: 'building', type: 'string'},
                                {name: 'device', type: 'string'}
                            ],
                            url: "https://app.psycho.unibas.ch/raumbuchung/overview/json/"
                        };
                var dataAdapter = new $.jqx.dataAdapter(source);
                    
                $("#jqxgrid").jqxGrid(
                        {
                            source: dataAdapter,
                            columnsresize: true,
                            columns: [
                                {text: 'Country Name', datafield: 'id', width: 200},
                                {text: 'City', datafield: 'name', width: 170},
                                {text: 'Population', datafield: 'type', width: 170},
                                {text: 'Continent Code', datafield: 'seats', minwidth: 110},
                                {text: 'Continent Code', datafield: 'building', minwidth: 110},
                                {text: 'Continent Code', datafield: 'device', minwidth: 110}
                            ]
                        });
            });
        </script>
    </head>
    <body class='default'>
        <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
            <div id="jqxgrid"></div>
        </div>
    </body>
</html>
    
    
    
    
//
// Muöti Test
//
  <script type="text/javascript">
var employeesSource =
    {
        datatype: "xml",
        datafields: [
            { name: 'FirstName', type: 'string' },
            { name: 'LastName', type: 'string' }
        ],
        root: "Employees",
        record: "Employee",
        id: 'EmployeeID',
        url: "../sampledata/employees.xml",
        async: false
    };
        
    var employeesAdapter = new $.jqx.dataAdapter(employeesSource, {
    autoBind: true,
    beforeLoadComplete: function (records) {
        var data = new Array();
        // update the loaded records. Dynamically add EmployeeName and EmployeeID fields. 
        for (var i = 0; i < records.length; i++) {
            var employee = records[i];
            employee.EmployeeName = employee.FirstName + " " + employee.LastName;
            employee.EmployeeID = employee.uid;
            data.push(employee);
        }
        return data;
    }
});
    
// prepare the data
var ordersSource =
{
    datatype: "xml",
    datafields: [
        // name - determines the field's name.
        // value - the field's value in the data source.
        // values - specifies the field's values.
        // values.source - specifies the foreign source. The expected value is an array.
        // values.value - specifies the field's name in the foreign source. 
        // values.name - specifies the field's value in the foreign source. 
        // When the ordersAdapter is loaded, each record will have a field called "EmployeeName". The "EmployeeName" for each record comes from the employeesAdapter where the record's "EmployeeID" from orders.xml matches to the "EmployeeID" from employees.xml. 
        { name: 'EmployeeName', value: 'EmployeeID', values: { source: employeesAdapter.records, value: 'EmployeeID', name: 'EmployeeName' } },
        { name: 'EmployeeID', map: 'm\\:properties>d\\:EmployeeID' },
        { name: 'ShippedDate', map: 'm\\:properties>d\\:ShippedDate', type: 'date' },
        { name: 'Freight', map: 'm\\:properties>d\\:Freight', type: 'float' },
        { name: 'ShipName', map: 'm\\:properties>d\\:ShipName' },
        { name: 'ShipAddress', map: 'm\\:properties>d\\:ShipAddress' },
        { name: 'ShipCity', map: 'm\\:properties>d\\:ShipCity' },
        { name: 'ShipCountry', map: 'm\\:properties>d\\:ShipCountry' }
    ],
    root: "entry",
    record: "content",
    id: 'm\\:properties>d\\:OrderID',
    url: "../sampledata/orders.xml",
    pager: function (pagenum, pagesize, oldpagenum) {
        // callback called when a page or page size is changed.
    }
};
var ordersAdapter = new $.jqx.dataAdapter(ordersSource);