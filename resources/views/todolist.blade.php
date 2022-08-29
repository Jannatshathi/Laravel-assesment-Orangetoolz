<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

        <style>
            input::placeholder{
                text-align: center;
                margin-left: 20%;
            }
        </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12 col-lg-12 ">
            <div class="container m-l-3 m-r-3 ">
                <div class="row">
                    <div class="col-md-12 col-lg-12 my-2">
                        <div class="row">
                            <div class="col-md-2 col-lg-2 "></div>
                            <div class="col-md-8 col-lg-8 d-flex justify-content-center my-5">
                                <form method="get">
                                    <input style="width: 270px;" type="text" name="task" id="task"
                                        placeholder="Write your task ...">
                                    <button type="button" class=" btn-md m-l-3 submit bg-white" style="-webkit-text-fill-color: red"><b> Add </b></button>
                                </form>
                            </div>
                            <div class="col-md-2 col-lg-2 "></div>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <!-- Todo List -->
                    <div class="col-md-4 col-lg-4">
                        <div class="card text-center">
                            <div class="card-header" style="background-color: rgba(255, 17, 0, 0.884)"> <b> To Do</b></div>
                            <div class="card-body" id="MyItems-list">
                                @foreach($todolist as $key=>$list)
                                <form action="{{route('list.update', $list->id)}}" method="get">
                                    <div class="d-inline-flex my-2">
                                        <span class="p-2">{{$list->task}} </span>
                                        <select style="width:50px;" name="process" class="form-select" aria-label="">
                                            <option value="inprogress">In Progress</option>
                                            <option value="done">Done</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm">Ok</button>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- In Progress List -->
                    <div class="col-md-4 col-lg-4">
                        <div class="card text-center">
                            <div class="card-header" style="background-color: rgba(255, 17, 0, 0.884)"><b>In Progress</b></div>
                            <div class="card-body">
                                @foreach($inprogresslist as $key=>$list)
                                <form action="{{route('progress.update', $list->id)}}" method="get">
                                    <div class="d-inline-flex my-2">
                                        <span class="p-2">{{$list->task}} </span>
                                        <select style="width:50px;" name="process" class="form-select" aria-label="">
                                            <option value="waiting">To Do</option>
                                            <option value="done">Done</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm">Ok</button>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Done List -->
                    <div class="col-md-4 col-lg-4">
                        <div class="card text-center">
                            <div class="card-header" style="background-color: rgba(255, 17, 0, 0.884)"><b>Done</b></div>
                            <div class="card-body">
                                @foreach($donelist as $key=>$list)
                                <form action="{{route('done.update', $list->id)}}" method="get">
                                    <div class="d-inline-flex my-2">
                                        <span class="p-2">{{$list->task}} </span>
                                        <select style="width:50px;" name="process" class="form-select" aria-label="">
                                            <option value="inprogress">In progress</option>
                                            <option value="waiting">To Do</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm">Ok</button>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".submit").click(function (e) {
            e.preventDefault();
            var task_name = $("input[name=task]").val();
            var MyItem_id = 1

            $.ajax({
                type: 'POST',
                url: "{{ route('api.store') }}",
                data: {
                    task: task_name
                },
                success: function (response) {
                    var MyItem = '<form action="{{url("/list-update/")}}' + '/' + response.tasks
                        .id + ' method="get"><div class="d-inline-flex my-2"><span class="p-2">' +
                        response.tasks.task + ' </span>';
                    MyItem +=
                        '<select style="width:50px;" name="process" class="form-select" aria-label=""><option value="inprogress">In progress</option><option value="waiting">Todo</option>';
                    MyItem +=
                        ' </select></div><button type="submit" class="btn btn-sm">Ok</button></form>';
                    $('#MyItems-list').append(MyItem);

                    alert("Task Added to list.");
                    document.getElementById('task').value = '';
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>
</html>
