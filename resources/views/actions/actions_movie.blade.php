@if(isset($movies))
    @if(!$movies->trashed())
        <a href="{{ route('movies.edit', [$movies->id]) }}" title="Edit Project"><i class="icon-pencil5 mr-1 icon-1x"></i></a>
        <a href="javascript:sdelete('movies/{{$movies->id}}')" title="Suspend User" class="delete-row delete-color" data-id="{{ $movies->id }}"><i class="icon-bin mr-3 icon-1x" style="color:red;"></i></a>
    @else
        <a href="javascript:restore('movies/restore/{{$movies->id}}')" title="Restore User" class="restore-row restore-color" data-id="{{ $movies->id }}"><i
                class="icon-loop3"></i></a>
        <a href="javascript:permanent('movies/deletePermanently/{{$movies->id}}')" title="Delete Permanently" class="delete-permanently-row delete-color" style="margin: 5px;" data-id="{{ $movies->id }}"><i
                class="icon-cancel-square2" style="color: red;"></i></a>
    @endif
@endif
