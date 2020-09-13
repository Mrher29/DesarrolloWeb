using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations; 


namespace fukin_project.Models
{
    public class Persona
    {
        [Key]
        public int id { get; set; }
        [Required]
        public string nombre { get; set; }
        [Required]
        public string apellido { get; set; }
        [Required]
        public string tipoPersona { get; set; }
        public string telefono { get; set; }
        public string direccion { get; set; }
    }
}
