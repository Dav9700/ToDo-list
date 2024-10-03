@isset($task)
    <h1>Edit  Task</h1>
@else 
    <h1>Create Task</h1>
@endisset


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <form method="POST" enctype="multipart/form-data" @isset($task)
            action ="{{route('tasks.update',$task)}}"
            @else
                action ="{{route('tasks.store')}}" 
            @endisset
            >
            @csrf

            @isset($task)
                @method('PUT')
            @endisset

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control"
                        name="title"
                        value="@isset($task){{$task->title}}@endisset" required autofocus >

                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control"
                        name="description" 
                        value="@isset($task){{$task->description}}@endisset" required autofocus>

                </div>
            </div>
    
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>

        </form>
    </body>
</html>