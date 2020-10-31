from django.contrib import admin

# Register your models here.
# Register your models here.
from registroPersona.models import tipoPersona
from registroPersona.models import Persona

admin.site.register(tipoPersona)

admin.site.register(Persona)


