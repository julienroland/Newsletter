
{!! Form::open(['route'=>'simplenewsletter.store'])!!}

<input type="email" name="email" id="email" required placeholder="{{trans('simplenewsletter::form.email')}}"/>
<input type="submit" value="S'inscrire">
{!! Form::close() !!}