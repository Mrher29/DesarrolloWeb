using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace miniInventario.Models
{
    public class producto
    {

        [Key]
        public int id { get; set; }
        [Required]
        public string nombre { get; set; }
        [Required]
        public double precio { get; set; }
    }
}
