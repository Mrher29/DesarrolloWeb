using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace fukin_project.Models
{
    public class Medicamento
    {
        [Key]
        public int id { get; set; }
        [Required]
        public string medicamento { get; set;  }
        [Required]
        [ForeignKey("Categoria")]
        public int idCategoria { get; set; }
    }
}
