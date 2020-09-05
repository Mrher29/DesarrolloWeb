using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using miniInventario.Data;
using miniInventario.Models;

namespace miniInventario.Controllers
{
    public class existenciasController : Controller
    {
        private readonly InventarioDbContext _context;

        public existenciasController(InventarioDbContext context)
        {
            _context = context;
        }

        // GET: existencias
        public async Task<IActionResult> Index()
        {
            return View(await _context.existencia.ToListAsync());
        }

        // GET: existencias/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var existencia = await _context.existencia
                .FirstOrDefaultAsync(m => m.id == id);
            if (existencia == null)
            {
                return NotFound();
            }

            return View(existencia);
        }

        // GET: existencias/Create
        public IActionResult Create()
        {
            return View();
        }

        // POST: existencias/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("id,cantidad,idpro")] existencia existencia)
        {
            if (ModelState.IsValid)
            {
                _context.Add(existencia);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            return View(existencia);
        }

        // GET: existencias/Edit/5
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var existencia = await _context.existencia.FindAsync(id);
            if (existencia == null)
            {
                return NotFound();
            }
            return View(existencia);
        }

        // POST: existencias/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("id,cantidad,idpro")] existencia existencia)
        {
            if (id != existencia.id)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(existencia);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!existenciaExists(existencia.id))
                    {
                        return NotFound();
                    }
                    else
                    {
                        throw;
                    }
                }
                return RedirectToAction(nameof(Index));
            }
            return View(existencia);
        }

        // GET: existencias/Delete/5
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var existencia = await _context.existencia
                .FirstOrDefaultAsync(m => m.id == id);
            if (existencia == null)
            {
                return NotFound();
            }

            return View(existencia);
        }

        // POST: existencias/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var existencia = await _context.existencia.FindAsync(id);
            _context.existencia.Remove(existencia);
            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool existenciaExists(int id)
        {
            return _context.existencia.Any(e => e.id == id);
        }
    }
}
