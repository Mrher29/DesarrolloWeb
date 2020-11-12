from django.contrib import admin


from migrations.models import TipoEvento
from migrations.models import TipoPersona
from migrations.models import Persona
from migrations.models import Evento

admin.site.register(TipoEvento)
admin.site.register(TipoPersona)
admin.site.register(Persona)
admin.site.register(Evento)



# Register your models here.
