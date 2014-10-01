
{!! Form::open(['route'=>'newsletter.store'])!!}

@include('flash::message')
<input type="email" name="email" id="email" required placeholder="{{trans('newsletter::form.email')}}"/>
<input type="submit" value="{{trans('newsletter::form.register')}}">

{!! Form::close() !!}