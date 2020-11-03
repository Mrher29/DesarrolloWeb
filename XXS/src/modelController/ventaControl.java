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

public class ventaControl implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	private Salida salida;
	
	ventaControl(){
		salida = new Salida();
	}
	
	@PersistenceContext(unitName = "XXS")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;

	public Salida getSalida() {
		return salida;
	}

	public void setSalida(Salida salida) {
		this.salida = salida;
	}
	
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(salida);
	    userTransaction.commit();
	}

}