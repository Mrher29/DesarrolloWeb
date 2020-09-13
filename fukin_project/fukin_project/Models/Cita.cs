using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace fukin_project.Models
{
    public class Cita
    {
        [Key]
        public int id { get; set; }
        [Required]
        [ForeignKey("Persona")]
        public int idpaciente { get; set; }
        [Required]
        [ForeignKey("Persona")]
        public int idmedico { get; set; }
        [Required]
        [DataType(DataType.Date)]
        public DateTime fecha { get; set; }
        [Required]
        public string observaciones { get; set; }

    }
}
