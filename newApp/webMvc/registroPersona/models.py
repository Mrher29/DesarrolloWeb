from django.db import models

# Create your models here.
class tipoPersona(models.Model):
    descripcion = models.CharField(max_length=100)
    def __str__(self):
        return self.descripcion

class Persona(models.Model):
    tipoPersona = models.ForeignKey(tipoPersona,on_delete=models.CASCADE)
    nombre = models.CharField(max_length=100)
    apellido = models.CharField(max_length=100)
    cui = models.CharField(max_length=100)
    address = models.CharField(max_length=100)
    def __str__(self):
        return self.nombre
        return self.apellido
        return self.cui
        return self.address