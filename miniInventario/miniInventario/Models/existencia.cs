using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace miniInventario.Models
{
    public class existencia
    {
        [Key]
        public int id { get; set; }
        [Required]
        public int cantidad { get; set; }
        [Required]
        [ForeignKey("existencia")]
        public int idpro { get; set; }
    }
}
