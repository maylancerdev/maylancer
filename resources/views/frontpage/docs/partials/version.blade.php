<div class="flex items-center border-b-2 border-gray-lighter py-4">
    <div class="text-xs font-normal leading-normal select">
        <select name="alias"onchange="location='{{ url('docs/'.$currentDoc['id']) }}/' + this.options[this.selectedIndex].value">

            @if (isset($currentVersion))


                @if (count($versions) > 1)
                    @foreach ($versions as $version)
                        <option value="{{ $version }}" @if($currentVersion == $version) selected="selected" @endif>
                            {{ $version }}
                        </option>
                    @endforeach




                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-bookmark"></span>
                            {{ $currentVersion }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach ($versions as $version)
                                <li><a href="{{ route('show', [$currentDoc['id'], $version]) }}">{{ $version }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else

                    <option value="{{ $currentVersion }}" selected="selected">
                        {{ $currentVersion }}
                    </option>
                @endif


            @endif




        </select>

    </div>


</div>