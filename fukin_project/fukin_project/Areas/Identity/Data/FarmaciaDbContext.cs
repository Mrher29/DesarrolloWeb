using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using fukin_project.Models;

namespace fukin_project.Areas.Identity.Data
{
    public class FarmaciaDbContext : DbContext
    {
        public FarmaciaDbContext(DbContextOptions<FarmaciaDbContext> options ) : base(options)
        {

        }
        public DbSet<Categoria> Categoria { get; set;  }
        public DbSet<Medicamento> Medicamento { get; set; }
        public DbSet<Persona> Persona { get; set; }
        public DbSet<Cita> Cita { get; set; }
        public DbSet<Receta> Receta { get; set; }

    }
}
