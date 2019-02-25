<div class="whitebox">
@for ($i = 1; $i < 6; $i++)
    <div class="flip">
        <b>Teilstrecke {{ $i }} </b>
        {{ Form::hidden('id', $input->id) }}
        {{ Form::hidden('customer', 1) }}
    </div>
    <div class="panel">
        <div class="my1013">
            <p class="my1011">
                {{ Form::label('start_'.$i, 'von', ['class' => 'form-control']) }}
            </p>
            <p class="my1012">
                @if ($i == 1)
                    {{ Form::text('start_'.$i, $input->sub_1->startOrt, ['class' => 'form-control']) }}
                @elseif ($i == 2)
                    {{ Form::text('start_'.$i, $input->sub_2->startOrt, ['class' => 'form-control']) }}
                @elseif ($i == 3)
                    {{ Form::text('start_'.$i, $input->sub_3->startOrt, ['class' => 'form-control']) }}
                @elseif ($i == 4)
                    {{ Form::text('start_'.$i, $input->sub_4->startOrt, ['class' => 'form-control']) }}
                @elseif ($i == 5)
                    {{ Form::text('start_'.$i, $input->sub_5->startOrt, ['class' => 'form-control']) }}
                @endif
            </p>
        </div>
        <div class="my1013">
            <p class="my1011">
                {{ Form::label('ziel_'.$i, 'nach', ['class' => 'form-control']) }}
            </p>
            <p class="my1012">
                @if ($i == 1)
                    {{ Form::text('ziel_'.$i, $input->sub_1->zielOrt, ['class' => 'form-control']) }}
                @elseif ($i == 2)
                    {{ Form::text('ziel_'.$i, $input->sub_2->zielOrt, ['class' => 'form-control']) }}
                @elseif ($i == 3)
                    {{ Form::text('ziel_'.$i, $input->sub_1->zielOrt, ['class' => 'form-control']) }}
                @elseif ($i == 4)
                    {{ Form::text('ziel_'.$i, $input->sub_1->zielOrt, ['class' => 'form-control']) }}
                @elseif ($i == 5)
                    {{ Form::text('ziel_'.$i, $input->sub_1->zielOrt, ['class' => 'form-control']) }}
                @endif
            </p>
        </div>
        <div class="my1013">
            <p class="my1011">
                {{ Form::label('fahrer_'.$i, 'Fahrer', [
                        'class' => 'form-control']) }}
            </p>
            <p class="my1012">
                <select name='fahrer'.$1 class='form-control'">
                        @if (isset($input->sub_1))
                            <option value="{{ $input->sub_1->fahrer }}">{{ $input->fahrer }}</option>
                        @endif
                        <option value="">---Bitte Auswählen---</option>
                        @foreach ($drivers as $driver)
                                <option value="{{ $driver->name }}">{{ $driver->name }}</option>
                        @endforeach
                </select>
            </p>
        </div>
        <div class="my1013">
            <p class="my1011">
                {{ Form::label('preis_'.$i, 'Preis', [
                        'class' => 'form-control']) }}
            </p>
            <p class="my1012">
                {{ Form::text('preis_'.$i, '', [
                    'class' => 'form-control']) }}
            </p><br>
        </div>
    </div>
@endfor 
</div>