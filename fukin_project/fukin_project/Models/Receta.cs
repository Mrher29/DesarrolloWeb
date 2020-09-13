using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace fukin_project.Models
{
    public class Receta
    {
        [Key]
        public int id { get; set; }
        [Required]
        [ForeignKey("Medicamento")]
        public int idmedicamento { get; set; }
        [Required]
        [ForeignKey("Cita")]
        public int idcita { get; set; }
    }
}
