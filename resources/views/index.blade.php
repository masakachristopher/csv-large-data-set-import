<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Import data from CSV file</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <style>

    </style>

    <div class="container mt-5">


        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div>

            <div class="font-weight-bold">
                <h6 class="float-right">
                    <a href="{{ url('export/xlsx') }}" class="mr-4"><span> <i>Excel export</i></span></a>
                    <a href="{{ url('diamonds') }}" class="mr-1"><span> <i>Show diamonds data</i></span></a>
                </h6>
            </div>

            <div>

                <form id="excel-csv-import-form" method="POST" action="{{ url('import') }}"
                    accept-charset="utf-8" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="csv-file" placeholder="Choose Csv File">
                            </div>
                            @error('csv-file')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="submit">Submit Csv File</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</body>

</html>
