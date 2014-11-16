from django.shortcuts import render,render_to_response
from django.http import HttpResponseRedirect
from django.contrib.auth import authenticate,login,logout
from registration.forms import UserForm,UserProfileForm
from django.contrib import messages
from registration.models import UserProfile
from datetime import datetime
import os
# Create your views here.

def index(request):
	return render(request,'index.html',{'title':'Home Page','current_page':'home'})

#Function get ip address of user
def get_client_ip(request):
    x_forwarded_for = request.META.get('HTTP_X_FORWARDED_FOR')
    if x_forwarded_for:
        ip = x_forwarded_for.split(',')[0]
    else:
        ip = request.META.get('REMOTE_ADDR')
    return ip


def register(request):	
	registered = False
	if request.method == "POST":
		user_form = UserForm(data=request.POST)
		profile_form = UserProfileForm(data=request.POST)
		print profile_form
		print request.FILES['picture']
		if user_form.is_valid() and profile_form.is_valid():
			
			user = user_form.save(commit=False)
			user.set_password(user.password)
			user.is_active=True
			user.save()
			profile = profile_form.save(commit=False)
			profile.user = user
			profile.lastLoginDate = datetime.now()
			profile.ipaddress=get_client_ip(request)
			if request.FILES['picture']:
				profile.picture = request.FILES['picture']
			profile.save()
			registered = True
		else:
			print user_form.errors, profile_form.errors
			messages.info(request,str(user_form.errors)+str(profile_form.errors))
	else:
		user_form = UserForm()
		profile_form = UserProfileForm()
	return render(request,'register.html',{'title':'Sign Up','current_page':'register',\
		'user_form':user_form,'profile_form':profile_form,'registered':registered})

def _login(request):
	if request.method=="POST":
		email = request.POST['email']
		password = request.POST['password']
		user = authenticate(username=email, password=password)
		if user is not None:
			if user.is_active:
				login(request, user)
				user.lastLoginDate=datetime.now()
				user.save()
				if not request.POST.get('remember_me', None):
					request.session.set_expiry(0)
				messages.info(request,'Welcome '+user.username)
				return HttpResponseRedirect('/dashboard/')
			else:
				messages.info(request,'Your account is inactive. Contact webmaster')
				return HttpResponseRedirect('/')
		else:
			messages.error(request,'Invalid username/password')
			return HttpResponseRedirect('/')
	else:
		messages.info('bad request')
		return HttpResponseRedirect('/')

def success(request):
	return render(request,'dashboard.html',{'title':'Dashboard','current_page':"dashboard"})

def _logout(request):
	logout(request)
	return HttpResponseRedirect('/')