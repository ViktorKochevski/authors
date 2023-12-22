<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible"/>

    <title>Authors Task</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 300px">
        <div class="col-6 text-center">
            <form method="POST" action="{{ route('csv.save') }}" enctype="multipart/form-data">
                @csrf

                <input id="file" name="file" type="file" class="{{--TODO: fix filepond not working--}} @error('file') is-invalid @enderror">
                @error('file')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror

                <button type="submit" class="mt-3 btn btn-danger">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            FIRST NAME
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            LAST NAME
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            DATE OF BIRTH
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            DATE OF DEATH
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            BOOKS
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            NOBEL PRIZE WINNER
                        </th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>
                                <div class="text-center flex-column">
                                    <div>
                                        <h6 class="mb-0 text-sm">{{ $author->first_name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center flex-column">
                                    <h6 class="mb-0 text-sm">{{ $author->last_name }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center flex-column">
                                    <h6 class="mb-0 text-sm">{{ $author->date_of_birth }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center flex-column">
                                    <h6 class="mb-0 text-sm">{{ $author->date_of_death }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center flex-column">
                                    <h6 class="mb-0 text-sm">{{ $author->book }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center flex-column">
                                    <h6 class="mb-0 text-sm">{{ $author->nobel_prize }}</h6>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script
        src="https://unpkg.com/filepond/dist/filepond.js">
    </script>

    <script>
        FilePond.parse(document.body);
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>
