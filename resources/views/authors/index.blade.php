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
</head>

<body>

        <div class="container d-flex justify-content-center align-items-center" style="height: 500px">
            <div class="col-6 text-center">
                <form method="POST" action="{{ route('csv.save') }}" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label text-white">Upload your CSV file here</label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                    <button type="submit" class="mt-5 btn btn-primary">
                        Upload
                    </button>
                </form>

                @if(Session::has('flash_message'))
                <div class="col-6 mx-auto pt-5">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 17 19">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                            {{ Session::get('flash_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>


        <div class="col-11 mx-auto">
            <div class="card-body pb-3">
                <div class="table-responsive">
                    <table class="table align-items-center">
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
                        </tr>
                        </thead>
                            <tbody>
                            @forelse($authors as $author)
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
                            @empty
                            </tbody>
                    </table>
                        <div class="col-2 text-center mx-auto my-5 alert alert-danger" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 17 19">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                            No data available
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>
</html>
