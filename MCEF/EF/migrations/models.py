from django.db import models

# Create your models here.
class TipoPersona(models.Model):
    descripcion = models.CharField(max_length=100)
    def __str__(self):
        return self.descripcion

class TipoEvento(models.Model):
    descripcion = models.CharField(max_length=100)
    def __str__(self):
        return self.descripcion

class Evento(models.Model):
    tipoEvento = models.ForeignKey(TipoEvento,on_delete=models.CASCADE)
    descripcion = models.CharField(max_length=100)
    fecha = models.CharField(max_length=100)
    costo = models.CharField(max_length=100)
    def __str__(self):
        return self.descripcion
        return self.fecha
        return self.costo


class Persona(models.Model):
    tipoPersona = models.ForeignKey(TipoPersona,on_delete=models.CASCADE)
    evento = models.ForeignKey(Evento,on_delete=models.CASCADE)
    nombre = models.CharField(max_length=100)
    apellido = models.CharField(max_length=100)
    tipoDocumento = models.CharField(max_length=100)
    documento = models.CharField(max_length=100)
    sexo = models.CharField(max_length=100)
    edad = models.CharField(max_length=100)
    def __str__(self):
        return self.nombre
        return self.apellido
        return self.tipoDocumento
        return self.documento
        return self.sexo
        return self.edad


