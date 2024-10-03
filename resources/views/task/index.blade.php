
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->title}}</td>
                <br>
                <td>{{$task->description}}</td>
                <td>{{ $task->created_at->format('H:i d/m/Y')}}</td>
                <button class="btn btn-danger" onclick="openDeleteModal({{ $task->id }})">Delete</button>
                <a class="btn btn-success" type="button"
                href="{{route('tasks.edit',$task)}}"> Edit </a>
                
            </tr>
            <br>
            <br>
            
        @endforeach
            <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this post?</p>
                        </div>
                        <div class="modal-footer">
                            @isset($task)
                                <form id="deleteForm" method="POST" action="{{route('tasks.destroy',$task)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

        
        <a type= "button" href ="{{route('tasks.create')}}">Add task </a>
        <br>
        <a href="{{route('get-logout')}}">Exit</a>      
        
    </body>
</html>

<script>
    function openDeleteModal(postId) {
        const form = document.getElementById('deleteForm');
        form.action = `/person/tasks/${postId}`; 
        $('#deleteModal').modal('show'); 
    }
</script>
