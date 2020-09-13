using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace fukin_project.Models
{
    public class Categoria
    {
        [Key]
        public int id { get; set; }
        [Required]
        public string categoria { get; set; }
    }
}
