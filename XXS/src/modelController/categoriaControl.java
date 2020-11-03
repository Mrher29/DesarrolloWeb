package modelController;

import java.io.Serializable;

import javax.annotation.Resource;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;

@Named
@SessionScoped

public class categoriaControl implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	private Categoria categoria;
	
	categoriaControl(){
		categoria = new Categoria();
	}
	
	@PersistenceContext(unitName = "XXS")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;

	public Categoria getCategoria() {
		return categoria;
	}

	public void setCategoria(Categoria categoria) {
		this.categoria = categoria;
	}
	
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(categoria);
	    userTransaction.commit();
	}

}