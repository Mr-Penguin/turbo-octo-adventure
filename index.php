<!-- this is a test -->
<!DOCTYPE html>
<html lang="de">
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
        <script type="text/javascript" src="/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxgrid.filter.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="/jqwidgets/jqxdropdownlist.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

        <script type="text/javascript">
            // Script that refreshed the site all X-milliseconds
            function checklength(i) {
                'use strict';
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

            var minutes, seconds, count, counter, timer;
            count = 60; //seconds
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
                document.getElementById("timer").innerHTML = 'N&auml;chste Aktualisierung in ' + minutes + ':' + seconds + ' ';
                if (count === 0) {
                    location.reload();
                }
            }
        </script> 

        <script type="text/javascript">
            $(document).ready(function() {


                // prepare the data
                var source =
                        {
                            datatype: "json",
                            datafields: [
                                {name: 'title', type: 'string'},
                                {name: 'room_name', type: 'string'},
                                {name: 'room_number', type: 'string'},
                                {name: 'start', type: 'date', format: "yyyy-MM-dd HH:mm"},
                                {name: 'end', type: 'date', format: "yyyy-MM-dd HH:mm"},
                                {name: 'email', type: 'string'},
                                {name: 'comment', type: 'string'}
                            ],
                            root: "record",
                            record: "",
                            // id: '',
                            url: "abjson.json",
                            sortcolumn: 'start',
                            sortdirection: 'asc'
                        };
                var dataAdapter = new $.jqx.dataAdapter(source, {
                    beforeLoadComplete: function(records) {
                        var data = new Array(); // needs to be a array, else beforeLoadComplete wont work
                        for (var i = 0; i < records.length; i++) { //for every entry it gets
                            var source = records[i]; //define variable SOURCE as every single record
                            var entryDate = source.start; //you find the user date in the variable SOURCE at datafield START

                            // todays date
                            var date = new Date();
                            // today is the date
                            var today = date;
                            
                            if (entryDate >= today) {
                                data.push(source);
                                // to-do: if the entry is today, show "Heute @ xx" or only the time
                                // to-do: show things that are currently running, highlight them
                            }

                            else {
                                // empty, else it will display no results
                            }

                        }
                        return data; //return the new filtered data -> ARRAY


                    }
                });

                $("#jqxgrid").jqxGrid(
                        {
                            theme: 'custom',
                            autoheight: true,
                            altrows: true,
                            autowidth: true,
                            // rowsheight: 40,
                            autorowheight: true,
                            source: dataAdapter,
                            pageable: true, //if false, shows ALL entries -> overload for our little pi
                            sortable: true, //entries are shown sorted depending on the date
                            columnsresize: false,
                            columns: [
                                {text: 'Raum #', dataField: 'room_number', width: 120},
                                {text: 'Raum-Name', dataField: 'room_name', width: 340},
                                {text: 'Von', dataField: 'start', width: 190, cellsformat: 'dd.MM -- HH:mm', cellsalign: 'center'}, // formating the date to a user friendly format
                                {text: 'Bis', dataField: 'end', width: 190, cellsformat: 'dd.MM -- HH:mm', cellsalign: 'center'}, // formating the date to a user friendly format
                               {text: 'Email', dataField: 'email', width: 400, cellsalign: 'center'},
                                {text: 'Titel', dataField: 'title', width: 300}
                                //{text: 'Kommentar', dataField: 'comment', width: 260, cellsalign: 'center'}
                                // {text: 'Kommentar', dataField: 'comment', width: 200, cellsalign: 'right', cellsformat: 'c2'}
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
                $('#clearsortingbutton').jqxButton({height: 50});
                $('#sortbackground').jqxCheckBox({checked: true, height: 50});
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

    <br>
    <body class='default'>
        <div id='time_now' style="font-size: 60px; font-weight: bold; width:1500px; margin:50px auto; text-align: center"></div>
        <div id='jqxWidget' style="font-size: 14px; font-family: sans-serif; width:1550px; margin:20px auto;">

            <br>
            &Uuml;bersicht &uuml;ber <b>alle R&auml;ume</b><br>
            <span id="timer"></span><br>

            <br>
            <div id="jqxgrid"></div>
            <div id="eventslog" style="margin-top: 30px;">
                <div style="float: left; margin-right: 10px;">

                </div>
            </div>
        </div>

        <br>

        <?php
        // script for downloading the json data from the raumreservation
        // executes on page reload
        $ch = curl_init();
        $source = "https://app.psycho.unibas.ch/raumbuchung/index/abjson";
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);


        $file = fopen("abjson.json", "w+");
        fputs($file, $data);
        fclose($file);
        ?>

        <div style="font-size:12px; text-align: center;">
            <img src="/images/walrus.png"><br>
            Crafted with &hearts; by the IT-Team. Ride the walrus!
        </div>
    </body>
    <script type="text/javascript">
        // Script für die Zeitanzeige.
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            // add a zero in front of numbers<10
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time_now').innerHTML = h + ":" + m; //+ ":" + s
            t = setTimeout(function() {
                startTime()
            }, 500);
        }
        startTime();
    </script>
</html>
