@extends('layouts.admin')
@section('title') Attendance Details @endsection
@section('content')
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>
    <style id="table_style" type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        table
        {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        table th
        {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
        }
        table th, table td
        {
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>

    <div class="table-responsive wishlist-table margin-bottom-none">
        <table class="table mb-3">
            <thead>
            <tr>
                <th><a href="{{ route('admin.dashboard') }}" style="color: black; text-decoration: none">{{ Auth::user()->name }}</a></th>
                <th class="text-center"><p class=""></p></th>
            </tr>
            </thead>
        </table>
        <div class="card mt-3">

            <div class="card-body">
                <input type="button" onclick="PrintTable();" value="Print" class="mb-3 text-end" />
                <div class="row">
                    <div class="col-lg-12" id="dvContents">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $i = 1)
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $attendance->user->name }}</td>
                                    <td>{{ $attendance->date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function PrintTable() {
            var printWindow = window.open('', '', 'height=7200,width=1200');
            printWindow.document.write('<html><head><title>Table Contents</title>');

            //Print the Table CSS.
            var table_style = document.getElementById("table_style").innerHTML;
            printWindow.document.write('<style type = "text/css">');
            printWindow.document.write(table_style);
            printWindow.document.write('</style>');
            printWindow.document.write('</head>');

            //Print the DIV contents i.e. the HTML Table.
            printWindow.document.write('<body>');
            var divContents = document.getElementById("dvContents").innerHTML;
            printWindow.document.write(divContents);
            printWindow.document.write('</body>');

            printWindow.document.write('</html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
